<?php
// src/Enum/SectionTypeEnum.php

namespace App\Enum;

enum SectionTypeEnum: string{
    case PERSONAL_INFO = 'personal_info';
    case EDUCATION = 'education';
    case EXPERIENCE = 'experience';
    case SKILLS = 'skills';
    case CERTIFICATIONS = 'certifications';
    case PROJECTS = 'projects';
    case LANGUAGES = 'languages';
    case INTERESTS = 'interests';

    public function getLabel(): string
    {
        return match($this) {
            self::PERSONAL_INFO => 'Personal Information',
            self::EDUCATION => 'Education',
            self::EXPERIENCE => 'Experience',
            self::SKILLS => 'Skills',
            self::CERTIFICATIONS => 'Certifications',
            self::PROJECTS => 'Projects',
            self::LANGUAGES => 'Languages',
            self::INTERESTS => 'Interests',
        };
    }
}
