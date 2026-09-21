import assert from 'node:assert/strict';
import test from 'node:test';

function createForm(validity) {
    const listeners = {};
    const errors = Object.fromEntries(Object.keys(validity).map((name) => [name, { textContent: '' }]));
    const fields = Object.fromEntries(Object.entries(validity).map(([name, valid]) => [name, {
        checkValidity: () => valid,
        setAttribute: (attribute, value) => {
            fields[name][attribute] = value;
        },
        focus: () => {
            fields[name].focused = true;
        },
    }]));
    const status = { textContent: '' };

    return {
        addEventListener: (event, callback) => {
            listeners[event] = callback;
        },
        elements: { namedItem: (name) => fields[name] },
        querySelector: (selector) => selector === '[data-form-status]'
            ? status
            : errors[selector.match(/"(.+)"/)?.[1]],
        reset: () => {
            status.reset = true;
        },
        submit: () => listeners.submit({ preventDefault: () => { status.prevented = true; } }),
        fields,
        errors,
        status,
    };
}

async function initialize(form) {
    global.document = { querySelectorAll: () => [form] };
    global.fetch = () => {
        throw new Error('The client-only form must not send a request.');
    };
    const { initializeConsultationForms } = await import('../../resources/js/consultation-form.js');

    initializeConsultationForms();
}

test('the consultation form prevents submission, announces labelled errors, and focuses the first invalid field', async () => {
    const form = createForm({ name: false, email: true, message: false });
    await initialize(form);

    form.submit();

    assert.equal(form.status.prevented, true);
    assert.equal(form.fields.name['aria-invalid'], 'true');
    assert.equal(form.fields.email['aria-invalid'], 'false');
    assert.equal(form.errors.name.textContent, 'Enter your name to continue.');
    assert.equal(form.errors.message.textContent, 'Tell us what you would like to discuss.');
    assert.equal(form.fields.name.focused, true);
    assert.equal(form.status.reset, undefined);
});

test('the consultation form resets and announces a non-booking mock success for valid input', async () => {
    const form = createForm({ name: true, email: true, message: true });
    await initialize(form);

    form.submit();

    assert.equal(form.status.prevented, true);
    assert.equal(form.status.reset, true);
    assert.equal(form.status.textContent, 'POC confirmation: your request was not sent and no appointment was created.');
});
