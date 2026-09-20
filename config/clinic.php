<?php

return [
    'name' => 'Dr. Bhatti & Associates',
    'tagline' => 'Prestigious Family Dental',
    'description' => 'Calm, architectural dental care providing precision preventative, cosmetic, restorative, and pediatric dentistry in a tranquil clinical setting.',

    'contact' => [
        'phone' => '+1 (555) 234-5678',
        'phone_raw' => '+15552345678',
        'whatsapp' => '+1 (555) 234-5678',
        'whatsapp_url' => 'https://wa.me/15552345678',
        'email' => 'concierge@drbhattidental.com',
        'address' => [
            'line1' => '450 Sutter St, Suite 1800',
            'city' => 'San Francisco',
            'state' => 'CA',
            'postal_code' => '94108',
            'formatted' => '450 Sutter St, Suite 1800, San Francisco, CA 94108',
        ],
        'coordinates' => [
            'lat' => 37.7897,
            'lng' => -122.4089,
        ],
    ],

    'hours' => [
        'schedule' => [
            ['days' => 'Monday – Thursday', 'hours' => '8:00 AM – 6:00 PM'],
            ['days' => 'Friday', 'hours' => '8:00 AM – 4:00 PM'],
            ['days' => 'Saturday', 'hours' => '9:00 AM – 2:00 PM (By Appointment)'],
            ['days' => 'Sunday', 'hours' => 'Closed'],
        ],
        'emergency' => '24/7 on-call emergency dental service available for registered patients.',
    ],

    'doctor' => [
        'name' => 'Dr. Tariq Bhatti',
        'title' => 'Clinical Director & Principal Dentist',
        'credentials' => 'DDS, FAGD, FICOI',
        'bio' => 'With over two decades of clinical distinction, Dr. Bhatti pairs gentle, precision dentistry with an empathetic approach. His philosophy centers on proactive prevention, patient-led dialogue, and long-term oral wellness in a tranquil clinical setting.',
        'philosophy' => 'Dentistry at its finest is restorative, invisible, and utterly calm. We honor the trust each patient places in our hands by crafting care plans that respect comfort, physiology, and individual aesthetic goals.',
        'accreditations' => [
            'Fellow, Academy of General Dentistry (FAGD)',
            'Fellow, International Congress of Oral Implantologists (FICOI)',
            'Member, American Academy of Cosmetic Dentistry (AACD)',
            'Faculty Clinical Advisor, Advanced Aesthetic Continuum',
        ],
    ],

    'treatments' => [
        [
            'id' => 'preventative',
            'title' => 'Preventative & Diagnostic Care',
            'tagline' => 'Proactive stewardship for lifelong oral health.',
            'description' => 'Comprehensive digital diagnostics, low-radiation imaging, biomimetic sealants, and therapeutic cleanings designed to protect natural tooth structure before issues emerge.',
            'highlights' => [
                'Digital 3D Cone Beam Imaging',
                'Therapeutic Ultrasonic Hygiene',
                'Salivary Diagnostics & pH Profiling',
                'Biomimetic Enamel Protection',
            ],
        ],
        [
            'id' => 'cosmetic',
            'title' => 'Cosmetic Smile Architecture',
            'tagline' => 'Subtle, harmonious enhancements reflecting natural character.',
            'description' => 'Custom porcelain veneers, minimally invasive bonding, and professional whitening crafted to harmonize with your facial proportions and natural enamel translucency.',
            'highlights' => [
                'Micro-Layered Porcelain Veneers',
                'Minimally Invasive Composite Bonding',
                'Precision Shade Calibration',
                'In-Office Laser Enamel Brightening',
            ],
        ],
        [
            'id' => 'restorative',
            'title' => 'Restorative & Implant Dentistry',
            'tagline' => 'Seamless reconstruction of function, bite balance, and comfort.',
            'description' => 'Biocompatible zirconia crowns, computer-guided titanium implant placement, and tooth-preserving onlays engineered for durability, natural mastication, and aesthetic integration.',
            'highlights' => [
                'Guided Titanium & Ceramic Implants',
                'Full-Contour Zirconia Crowns',
                'Conservative Ceramic Onlays',
                'Full-Arch Biomimetic Rehabilitation',
            ],
        ],
        [
            'id' => 'pediatric',
            'title' => 'Pediatric & Multi-Generational Dentistry',
            'tagline' => 'Instilling positive, anxiety-free dental habits from the start.',
            'description' => 'Gentle, fear-free dental visits for infants, children, and teens. We emphasize positive sensory conditioning, fluoride alternatives, and airway-conscious developmental assessments.',
            'highlights' => [
                'Gentle Sensory Acclimation Visits',
                'Airway & Myofunctional Screening',
                'BPA-Free Protective Sealants',
                'Custom Athletic Mouthguards',
            ],
        ],
    ],

    'journey' => [
        [
            'step' => '01',
            'title' => 'Initial Consultation & Dialogue',
            'description' => 'An unhurried conversation in a quiet private consultation suite to understand your oral history, comfort preferences, and personal smile goals.',
        ],
        [
            'step' => '02',
            'title' => 'Comprehensive Digital Diagnostics',
            'description' => 'Ultra-low-dose 3D cone-beam scans, intraoral HD photography, and digital bite mapping provide complete diagnostic clarity without discomfort.',
        ],
        [
            'step' => '03',
            'title' => 'Personalized Care Formulation',
            'description' => 'Dr. Bhatti collaborates with you to review treatment options, material selections, transparent sequencing, and scheduling that fits your life.',
        ],
        [
            'step' => '04',
            'title' => 'Gentle, Precision Treatment',
            'description' => 'Care delivered with warm blankets, noise-canceling acoustics, ergonomic positioning, and modern local anesthesia protocols designed for total comfort.',
        ],
        [
            'step' => '05',
            'title' => 'Lifelong Wellness & Support',
            'description' => 'Continuous preventative monitoring, digital check-ins, and proactive maintenance ensure your smile remains healthy and radiant for decades.',
        ],
    ],
];
