<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Traits;


use Doctrine\Common\Collections\ArrayCollection;
use HelpPC\CzechDataBox\Entity\File;

trait GetMainFile
{

    public function getFiles()
    {
        return new ArrayCollection();
    }

    public function getMainFile()
    {
        /** @var File $file */
        foreach ($this->getFiles() as $file) {
            if ($file->getMetaType() === 'main') {
                return $file;
            }
        }
    }
}