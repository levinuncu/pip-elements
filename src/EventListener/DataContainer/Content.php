<?php

namespace PiP\PiPElementsBundle\EventListener\DataContainer;

use Contao\ContentModel;
use Contao\Database;
use Contao\DataContainer;
use Contao\Input;
use Contao\CoreBundle\ServiceAnnotation\Callback;

/**
 * @Callback(table="tl_content", target="config.onsubmit")
 */
final class Content
{
    public function __invoke(DataContainer $dc)
    {
        $data = (array) $dc->getCurrentRecord();

        if (!\in_array($data["type"], ["content_box_start"], true)) {
            return;
        }

        if (
            "auto" !== Input::post("SUBMIT_TYPE") &&
            $this->siblingStopElementIsMissing(
                $data["pid"],
                $data["ptable"],
                $data["sorting"]
            )
        ) {
            unset($data["id"]);
            $data["type"] = str_replace("start", "stop", $data["type"]);
            ++$data["sorting"];

            $newElement = new ContentModel();

            $newElement->tstamp = time();
            $newElement->setRow($data);
            $newElement->save();
        }
    }
    private function siblingStopElementIsMissing($pid, $ptable, $sorting): bool
    {
        $statement = Database::getInstance()
            ->prepare(
                sprintf(
                    'SELECT * FROM tl_content WHERE pid=? AND ptable=? AND sorting>? AND type IN("content_box_start", "content_box_stop") ORDER BY sorting'
                )
            )
            ->limit(1)
            ->execute($pid, $ptable, $sorting);

        if (false === ($row = $statement->fetchAssoc())) {
            return true;
        }

        if ("content_box_end" !== $row["type"]) {
            return true;
        }

        return false;
    }
}
