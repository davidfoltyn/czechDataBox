<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Traits;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use HelpPC\CzechDataBox\Entity\File;

trait GetMainFile
{

    /**
     * @return Collection<mixed,mixed>
     */
    public function getFiles(): Collection
    {
        return new ArrayCollection();
    }

    public function getMainFile(): ?File
    {
        /** @var File $file */
        foreach ($this->getFiles() as $file) {
            if ($file->getMetaType() === 'main') {
                return $file;
            }
        }
        return NULL;
    }
}