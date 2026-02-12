<?php
// src/Enum/ApplicationStatus.php

namespace App\Enum;

enum ApplicationStatusEnum:string
{
    case PENDING = "pending";
    case DECISION_IN_PROGRESS = "decision_in_progress";
    case TO_APPLY = 'to_apply';
    case SENT = 'sent';
    case INTERVIEW = 'interview';
    case OFFER = 'offer';
    case REJECTED = 'rejected';
    case ARCHIVED = 'archived';

    public function getLabel(): string
    {
        return match($this) {
            self::PENDING => 'Pending',
            self::DECISION_IN_PROGRESS => 'Decision in progress',
            self::TO_APPLY => 'To apply',
            self::SENT => 'Sent',
            self::INTERVIEW => 'Interview',
            self::OFFER => 'Offer',
            self::REJECTED => 'Rejected',
            self::ARCHIVED => 'Archived',
        };
    }

    public function getColor(): string
    {
        return match($this) {

            self::PENDING => 'orange',         // En attente de traitement
            self::DECISION_IN_PROGRESS => 'cyan',    // Examen par le recruteur
            self::TO_APPLY => 'slate',         // Pas encore commencé
            self::SENT => 'blue',              // Candidature transmise
            self::INTERVIEW => 'violet',       // Phase active d'entretien
            self::OFFER => 'emerald',          // Résultat positif
            self::REJECTED => 'rose',          // Résultat négatif (rose moins agressif que rouge)
            self::ARCHIVED => 'stone',         // Fermé/Historique
        };
    }

}


