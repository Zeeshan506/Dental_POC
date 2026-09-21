<?php

return [
    'navigation' => [
        ['label' => 'Home', 'path' => '/'],
        ['label' => 'About', 'path' => '/about'],
        ['label' => 'Treatments', 'path' => '/services'],
        ['label' => 'Team', 'path' => '/team'],
        ['label' => 'Patient Journey', 'path' => '/patient-journey'],
        ['label' => 'Reviews', 'path' => '/reviews'],
        ['label' => 'Contact', 'path' => '/contact'],
    ],
    'pages' => [
        'home' => ['title' => 'Dental Care', 'description' => 'Explore the clinic, its care approach, and ways to begin a consultation.'],
        'about' => ['title' => 'About the Practice', 'description' => 'Learn about the practice approach and its calm, patient-led consultation experience.', 'heading' => 'A considered approach to dental care', 'intro' => 'This proof-of-concept page presents the clinic information supplied for review. Final practice narrative requires client approval.'],
        'services' => ['title' => 'Treatments', 'description' => 'Explore informational summaries of the clinic’s treatment areas.', 'heading' => 'Treatment information', 'intro' => 'Treatment information is provided for discussion during a consultation; it is not a promise of a clinical outcome.'],
        'team' => ['title' => 'Team', 'description' => 'Meet the clinical director and review the team information awaiting approval.', 'heading' => 'The people behind your care', 'intro' => 'Only client-supplied team information is represented. Supporting team profiles remain explicitly unapproved placeholders.'],
        'patient-journey' => ['title' => 'Patient Journey', 'description' => 'Understand the clinic’s consultation and care-planning journey.', 'heading' => 'A clear, unhurried journey', 'intro' => 'Each step is informational and will be tailored by the clinical team after consultation.'],
        'reviews' => ['title' => 'Reviews', 'description' => 'Review the testimonial presentation awaiting client approval.', 'heading' => 'Review presentation', 'intro' => 'Every review below is a visual-content placeholder pending client approval and a supplied destination.'],
        'contact' => ['title' => 'Contact', 'description' => 'Contact the clinic or try the proof-of-concept consultation form.', 'heading' => 'Start a consultation dialogue', 'intro' => 'Use the contact details below or try the client-only form prototype. It does not send a request or create a booking.'],
        'faq' => ['title' => 'Frequently Asked Questions', 'description' => 'Read common consultation and care-planning questions.', 'heading' => 'Frequently asked questions', 'intro' => 'These answers are informational and require clinical confirmation for an individual patient.'],
        'privacy' => ['title' => 'Privacy', 'description' => 'Read the privacy-policy approval placeholder.', 'heading' => 'Privacy policy pending approval', 'intro' => 'Final privacy-policy text has not been supplied or approved by the client.'],
        'terms' => ['title' => 'Terms', 'description' => 'Read the terms-of-use approval placeholder.', 'heading' => 'Terms of use pending approval', 'intro' => 'Final terms-of-use text has not been supplied or approved by the client.'],
    ],
    'services' => [
        ['slug' => 'dental-implants', 'name' => 'Dental Implants', 'introduction' => 'An informational overview of restorative implant discussions.', 'suitability' => 'Suitability is determined only after a clinical examination and treatment discussion.', 'process' => 'Assessment, planning, treatment options, and follow-up are discussed with the patient.', 'benefits' => ['Function-focused planning', 'Individual clinical assessment'], 'technology' => 'Any technology or material choice requires clinician confirmation.', 'faqs' => ['What happens first?' => 'A consultation establishes whether further assessment is appropriate.'], 'related' => ['restorative-care']],
        ['slug' => 'preventative-care', 'name' => 'Preventative Care', 'introduction' => 'Information about routine dental-care conversations and prevention planning.', 'suitability' => 'Recommendations depend on individual oral-health history and examination.', 'process' => 'A clinician reviews history, concerns, and appropriate next steps.', 'benefits' => ['Care-plan discussion', 'Long-term oral-health focus'], 'technology' => 'Technology details are confirmed by the clinical team.', 'faqs' => ['Can I ask questions first?' => 'Yes. A consultation is designed for clear discussion.'], 'related' => ['dental-implants']],
        ['slug' => 'restorative-care', 'name' => 'Restorative Care', 'introduction' => 'Information about restorative-care planning conversations.', 'suitability' => 'A clinician must assess individual needs before recommending any treatment.', 'process' => 'Options, timing, materials, and care considerations are discussed after assessment.', 'benefits' => ['Individual planning', 'Clear treatment discussion'], 'technology' => 'Materials and technology are never promised before clinical assessment.', 'faqs' => ['Are results guaranteed?' => 'No. This site does not make clinical guarantees.'], 'related' => ['dental-implants']],
    ],
    'team' => [
        ['slug' => 'dr-tariq-bhatti', 'name' => 'Dr. Tariq Bhatti', 'role' => 'Clinical Director & Principal Dentist', 'details' => 'Established POC content is displayed on the homepage. Final biography and credentials require client review.', 'approved' => false],
        ['slug' => 'supporting-team-member', 'name' => 'Supporting team member', 'role' => 'Profile pending client approval', 'details' => 'No credentials, biography, accreditation, or clinical claims have been supplied for this placeholder profile.', 'approved' => false],
    ],
    'faqs' => [
        ['question' => 'Can I book through this website?', 'answer' => 'No. The consultation form is a client-only prototype and does not create a booking or send your details.'],
        ['question' => 'Are treatment outcomes guaranteed?', 'answer' => 'No. Treatment information is educational and individual suitability must be discussed with a clinician.'],
        ['question' => 'Where can I find final policy information?', 'answer' => 'Privacy and terms content is visibly marked as awaiting client approval.'],
    ],
    'reviews' => ['approved' => false, 'google_url' => null, 'notice' => 'Placeholder review content — client approval and an approved destination are required before publication.'],
    'legal' => ['approved' => false, 'notice' => 'Final legal copy requires client approval before this proof-of-concept can be published.'],
    'open_graph' => ['approved' => false, 'notice' => 'Open Graph image placeholder — client-approved social imagery is required.'],
];
