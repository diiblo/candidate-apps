<?php
// src/Enum/EventTypeEnum.php

namespace App\Enum;

enum EventTypeEnum: string {
    // Événements de cycle de vie
    case APPLICATION_CREATED = 'app_created';
    case STATUS_CHANGED = 'status_changed';

    // Événements d'interaction
    case NOTE_ADDED = 'note_added';
    case DOCUMENT_ATTACHED = 'doc_attached';

    // Événements de relance
    case NEXT_ACTION_ADDED = 'action_added';
    case NEXT_ACTION_COMPLETED = 'action_completed';

    public function getLabel(): string
    {
        return match($this) {
            self::APPLICATION_CREATED => 'Candidature créée',
            self::STATUS_CHANGED => 'Changement de statut',
            self::NOTE_ADDED => 'Note ajoutée',
            self::DOCUMENT_ATTACHED => 'Document ajouté',
            self::NEXT_ACTION_ADDED => 'Rappel programmé',
            self::NEXT_ACTION_COMPLETED => 'Rappel effectué',
        };
    }

    /**
     * Utile pour afficher des badges de couleurs différentes dans la timeline Twig
     */
    public function getColor(): string
    {
        return match($this) {
            self::APPLICATION_CREATED => 'blue',
            self::STATUS_CHANGED => 'purple',
            self::NEXT_ACTION_COMPLETED => 'green',
            default => 'gray',
        };
    }
}
