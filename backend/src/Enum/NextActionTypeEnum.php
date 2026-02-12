<?php
// src/Enum/NextActionType.php

namespace App\Enum;

enum NextActionTypeEnum: string
{
    // --- Application prep / submission ---
    case APPLY = 'apply';
    case FIND_JOB_POSTING = 'find_job_posting';
    case RESEARCH_COMPANY = 'research_company';
    case RESEARCH_ROLE = 'research_role';
    case CUSTOMIZE_CV = 'customize_cv';
    case WRITE_COVER_LETTER = 'write_cover_letter';
    case UPDATE_PORTFOLIO = 'update_portfolio';
    case GATHER_REFERENCES = 'gather_references';
    case FILL_APPLICATION_FORM = 'fill_application_form';
    case UPLOAD_DOCUMENTS = 'upload_documents';
    case SUBMIT_APPLICATION = 'submit_application';

    // --- Communication / networking ---
    case FOLLOW_UP = 'follow_up';
    case SEND_EMAIL = 'send_email';
    case MESSAGE_LINKEDIN = 'message_linkedin';
    case NETWORKING = 'networking';
    case REQUEST_REFERRAL = 'request_referral';
    case CALL = 'call';

    // --- Interview process ---
    case SCHEDULE_INTERVIEW = 'schedule_interview';
    case CONFIRM_INTERVIEW = 'confirm_interview';
    case PREPARE_INTERVIEW = 'prepare_interview';
    case ATTEND_INTERVIEW = 'attend_interview';
    case SEND_THANK_YOU = 'send_thank_you';

    // --- Assessments ---
    case TAKE_ASSESSMENT = 'take_assessment';
    case DO_HOME_ASSIGNMENT = 'do_home_assignment';
    case SUBMIT_ASSIGNMENT = 'submit_assignment';
    case PREPARE_TECHNICAL = 'prepare_technical';

    // --- Offer / closure ---
    case REVIEW_OFFER = 'review_offer';
    case NEGOTIATE_OFFER = 'negotiate_offer';
    case ACCEPT_OFFER = 'accept_offer';
    case DECLINE_OFFER = 'decline_offer';
    case COMPLETE_ONBOARDING_DOCS = 'complete_onboarding_docs';

    // --- Tracking / admin ---
    case UPDATE_STATUS = 'update_status';
    case ADD_NOTES = 'add_notes';
    case SET_REMINDER = 'set_reminder';
    case ARCHIVE_APPLICATION = 'archive_application';

    // --- Generic ---
    case PREPARE_DOCUMENTS = 'prepare_documents';
    case OTHER = 'other';

    public function getLabel(): string
    {
        return match ($this) {
            // Application prep / submission
            self::APPLY => 'Apply',
            self::FIND_JOB_POSTING => 'Find job posting',
            self::RESEARCH_COMPANY => 'Research company',
            self::RESEARCH_ROLE => 'Research role',
            self::CUSTOMIZE_CV => 'Customize CV',
            self::WRITE_COVER_LETTER => 'Write cover letter',
            self::UPDATE_PORTFOLIO => 'Update portfolio',
            self::GATHER_REFERENCES => 'Gather references',
            self::FILL_APPLICATION_FORM => 'Fill application form',
            self::UPLOAD_DOCUMENTS => 'Upload documents',
            self::SUBMIT_APPLICATION => 'Submit application',

            // Communication / networking
            self::FOLLOW_UP => 'Follow-up',
            self::SEND_EMAIL => 'Send email',
            self::MESSAGE_LINKEDIN => 'Message on LinkedIn',
            self::NETWORKING => 'Networking',
            self::REQUEST_REFERRAL => 'Request referral',
            self::CALL => 'Call',

            // Interview process
            self::SCHEDULE_INTERVIEW => 'Schedule interview',
            self::CONFIRM_INTERVIEW => 'Confirm interview',
            self::PREPARE_INTERVIEW => 'Prepare interview',
            self::ATTEND_INTERVIEW => 'Attend interview',
            self::SEND_THANK_YOU => 'Send thank you message',

            // Assessments
            self::TAKE_ASSESSMENT => 'Take assessment',
            self::DO_HOME_ASSIGNMENT => 'Do home assignment',
            self::SUBMIT_ASSIGNMENT => 'Submit assignment',
            self::PREPARE_TECHNICAL => 'Prepare technical interview',

            // Offer / closure
            self::REVIEW_OFFER => 'Review offer',
            self::NEGOTIATE_OFFER => 'Negotiate offer',
            self::ACCEPT_OFFER => 'Accept offer',
            self::DECLINE_OFFER => 'Decline offer',
            self::COMPLETE_ONBOARDING_DOCS => 'Complete onboarding documents',

            // Tracking / admin
            self::UPDATE_STATUS => 'Update status',
            self::ADD_NOTES => 'Add notes',
            self::SET_REMINDER => 'Set reminder',
            self::ARCHIVE_APPLICATION => 'Archive application',

            // Generic
            self::PREPARE_DOCUMENTS => 'Prepare documents',
            self::OTHER => 'Other',
        };
    }
}
