<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Utils;


use HelpPC\CzechDataBox\Exception\BadOptionException;

class DataBoxStatus
{
    const GENERAL = 'GENERAL';
    const ADDRESS = 'ADDRESS';
    const ICO = 'ICO';
    const DBID = 'DBID';
    const ALL = 'ALL';
    const OVM = 'OVM';
    const OVM_MAIN = 'OVM_MAIN';
    const OVM_REQ = 'OVM_REQ';
    const OVM_NOTAR = 'OVM_NOTAR';
    const OVM_EXEKUT = 'OVM_EXEKUT';
    const OVM_FO = 'OVM_FO';
    const OVM_PFO = 'OVM_PFO';
    const OVM_PO = 'OVM_PO';
    const PO = 'PO';
    const PO_ZAK = 'PO_ZAK';
    const PO_REQ = 'PO_REQ';
    const PFO = 'PFO';
    const PFO_ADVOK = 'PFO_ADVOK';
    const PFO_INSSPR = 'PFO_INSSPR';
    const PFO_DANPOR = 'PFO_DANPOR';
    const PFO_AUDITOR = 'PFO_AUDITOR';
    const FO = 'FO';

    const TYPE_GENERAL = 'GENERAL';
    const TYPE_ADDRESS = 'ADDRESS';
    const TYPE_ICO = 'ICO';
    const TYPE_DBID = 'DBID';
    const SCOPE_ALL = 'ALL';
    const SCOPE_OVM = 'OVM';
    const SCOPE_OVM_MAIN = 'OVM_MAIN';
    const SCOPE_OVM_REQ = 'OVM_REQ';
    const SCOPE_OVM_NOTAR = 'OVM_NOTAR';
    const SCOPE_OVM_EXEKUT = 'OVM_EXEKUT';
    const SCOPE_OVM_FO = 'OVM_FO';
    const SCOPE_OVM_PFO = 'OVM_PFO';
    const SCOPE_OVM_PO = 'OVM_PO';
    const SCOPE_PO = 'PO';
    const SCOPE_PO_ZAK = 'PO_ZAK';
    const SCOPE_PO_REQ = 'PO_REQ';
    const SCOPE_PFO = 'PFO';
    const SCOPE_PFO_ADVOK = 'PFO_ADVOK';
    const SCOPE_PFO_INSSPR = 'PFO_INSSPR';
    const SCOPE_PFO_DANPOR = 'PFO_DANPOR';
    const SCOPE_PFO_AUDITOR = 'PFO_AUDITOR';
    const SCOPE_FO = 'FO';

    const PDZ_K = 'K';
    const PDZ_O = 'O';
    const PDZ_G = 'G';
    const PDZ_E = 'E';

    public static function getPDZTypes()
    {
        return [
            self::PDZ_E => 'PDZ z kreditu',
            self::PDZ_G => 'Globálně dotovaná',
            self::PDZ_O => 'Odpovědní PDZ',
            self::PDZ_K => 'Smluvní PDZ',
        ];
    }

    /**
     * @param string $type
     * @return mixed
     * @throws BadOptionException
     */
    public static function getPDZTypeAsString(string $type)
    {
        if (in_array($type, self::getPDZTypes())) {
            return self::getPDZTypes()[$type];
        }
        throw new BadOptionException(sprintf('The value %s is not allowed', $type));
    }

    public static function getDataBoxTypes()
    {
        return [
            self::OVM,
            self::ALL => 'ALL',
            self::OVM => 'Orgán veřejné moci',
            self::OVM_REQ => 'Schránka OVM zřízená na žádost',
            self::OVM_NOTAR => 'Orgán veřejné moci - notář',
            self::OVM_EXEKUT => 'Orgán veřejné moci - exekutor',
            self::OVM_FO => 'Orgán veřejné moci z fyzické osoby',
            self::OVM_PFO => 'Orgán veřejné moci z právnické fyzické osoby',
            self::OVM_PO => 'Orgán veřejné moci z právnické osoby',
            self::PO => 'Právnická osoba zapsaná v obchodním rejstříku',
            self::PO_ZAK => 'Právnická osoba zřízená zákonem',
            self::PO_REQ => 'Právnická osoba - na žádost',
            self::PFO => 'Podnikající fyzická osoba',
            self::PFO_ADVOK => 'Advokát',
            self::PFO_INSSPR => 'Insolvenční správce',
            self::PFO_DANPOR => 'Daňový poradce',
            self::PFO_AUDITOR => 'Statutární auditor',
            self::FO => 'Fyzická osoba',
            null => 'Technická skupina'
        ];
    }

    /**
     * @param string $type
     * @return mixed
     * @throws BadOptionException
     */
    public static function getDataBoxTypeAsString(string $type)
    {

        if (in_array($type, self::getDataBoxTypes())) {
            return self::getDataBoxTypes()[$type];
        }
        throw new BadOptionException(sprintf('The value %s is not allowed', $type));
    }
}