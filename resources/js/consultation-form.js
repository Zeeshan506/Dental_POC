const errors = {
    name: 'Enter your name to continue.',
    email: 'Enter a valid email address to continue.',
    message: 'Tell us what you would like to discuss.',
};

function initializeConsultationForms() {
    document.querySelectorAll('[data-consultation-form]').forEach((form) => {
        form.addEventListener('submit', (event) => {
            event.preventDefault();

            let firstInvalidField = null;
            Object.entries(errors).forEach(([name, message]) => {
                const field = form.elements.namedItem(name);
                const error = form.querySelector(`[data-form-error="${name}"]`);
                const isValid = field?.checkValidity();

                field?.setAttribute('aria-invalid', String(! isValid));
                if (error) {
                    error.textContent = isValid ? '' : message;
                }

                firstInvalidField ??= isValid ? null : field;
            });

            if (firstInvalidField) {
                firstInvalidField.focus();

                return;
            }

            form.reset();
            form.querySelector('[data-form-status]').textContent = 'POC confirmation: your request was not sent and no appointment was created.';
        });
    });
}

export { initializeConsultationForms };
