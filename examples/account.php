<?php
require 'credentials.php';
$console->writeln(sprintf('Komunikovat bude probihat vuci %s za datovou schranku s id %s ', ($account->getPortalType()->equalsValue(\HelpPC\CzechDataBox\Enum\PortalTypeEnum::MOJEDATOVASCHRANKA) ? 'mojedatovaschranka.cz' : 'czebox.cz'), $account->getDataBoxId()));
/** @var \HelpPC\CzechDataBox\Manager $manager */

/***********************************/
$console->write('   - Probiha ziskavani informaci dle loginu');
/** @var \HelpPC\CzechDataBox\Response\GetOwnerInfoFromLogin */
$res = $manager->getOwnerInfoFromLogin($account);
if ($res->getStatus()->isOk()) {
    $console->writeln(' -> OK ' . sprintf('DS "%s" typ subjektu "%s"', $res->getOwnerInfo()->getFirmName(), $res->getOwnerInfo()->getDataBoxType()));
} else {
    $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
}

/***********************************/
$console->write('   - Probiha ziskavani informaci o expiraci hesla');
/** @var \HelpPC\CzechDataBox\Response\GetPasswordExpirationInfo */
$res = $manager->getPasswordExpirationInfo($account);
if ($res->getStatus()->isOk()) {
    $console->write(' -> OK ');
    if ($res->getPasswordExpiry() === null) {
        $console->writeln('heslo nema nastavenou expiraci a je platne bez omezeni');
    } else {
        $console->writeln(sprintf('heslo expiruje %s', $res->getPasswordExpiry()->format('j.n.Y, G:i')));
    }
} else {
    $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
}
