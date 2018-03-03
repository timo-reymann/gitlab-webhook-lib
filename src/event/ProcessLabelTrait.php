<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


trait ProcessLabelTrait
{
    private function processLabels($labels)
    {
        $final = [];
        for ($i = 0; $i < count($labels); $i++) {
            $label = $labels[$i];

            $final[] = new Label(
                $label['id'],
                $label['title'],
                $label['color'],
                $label['project_id'],
                $label['created_at'],
                $label['updated_at'],
                $label['template'],
                $label['description'],
                $label['type'],
                $label['group_id']
            );
        }

        return $final;
    }
}