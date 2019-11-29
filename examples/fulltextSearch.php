<?php
require 'credentials.php';
$console->writeln(sprintf('Komunikovat bude probihat vuci %s za datovou schranku s id %s typu %s ', ($account->getPortalType() == $account::ENV_PROD ? 'mojedatovaschranka.cz' : 'czebox.cz'), ISDS_ID, $type));
/** @var \HelpPC\CzechDataBox\Manager $manager */

$ownerInfo = new \HelpPC\CzechDataBox\Entity\OwnerInfo();
$ownerInfo->setDataBoxId(($type == 'ovm' ? $config['fo']['id'] : $config['ovm']['id']));
/***********************************/
$console->write('   - Probiha fulltextove vyhledavani');
$input = new \HelpPC\CzechDataBox\Request\ISDSSearch2();
$input->setSearchText('Ministerstvo')
    ->setSearchType(\HelpPC\CzechDataBox\Utils\DataBoxStatus::TYPE_GENERAL)
    ->setSearchScope(\HelpPC\CzechDataBox\Utils\DataBoxStatus::SCOPE_OVM);
/** @var \HelpPC\CzechDataBox\Response\ISDSSearch2 */
$res = $manager->ISDSSearch2($account, $input);
if ($res->getStatus()->isOk()) {
    $console->writeln(' -> OK ' . sprintf('Bylo nalezeno celkem %d zaznamu a nacteno je %d', $res->getTotalCount(), $res->getCurrentCount()));
    /** @var \HelpPC\CzechDataBox\Entity\DataBoxResult $result */
    foreach ($res->getResult() as $key => $result) {
        $console->writeln(sprintf('     %d. - %s => %s', $key, $result->getDataBoxId(), $result->getDataBoxName()));
        if ($res->getResult()->indexOf($result) < 1) {
            $console->writeln('         Zjistovani zda je schranka aktivni');
            $ch = new \HelpPC\CzechDataBox\Request\CheckDataBox();
            $ch->setDataBoxId($result->getDataBoxId());
            /** @var \HelpPC\CzechDataBox\Response\CheckDataBox $resT */
            $resT = $manager->CheckDataBox($account, $ch);
            if ($res->getStatus()->isOk()) {
                $console->writeln('         -> schranka ' . ($resT->getState() == 1 ? 'je' : 'neni') . ' aktivni');
            } else {
                $console->writeln('         -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
            }
        }
    }
} else {
    $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
}
/*********************************************************/
$console->write('   - hledani dle FindDataBox');
$input = new \HelpPC\CzechDataBox\Request\FindDataBox();
$input->setOwnerInfo($ownerInfo);
/** @var \HelpPC\CzechDataBox\Response\FindDataBox $res */
$res = $manager->FindDataBox($account, $input);
if ($res->getStatus()->isOk()) {
    $console->writeln(' -> OK - bylo nalezeno celkem ' . $res->getResult()->count());
} else {
    $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
}
/*********************************************************/
$console->write('   - zjistovani informaci o PDZ');
/** @var \HelpPC\CzechDataBox\Response\VerifyMessage $res */
$input = new \HelpPC\CzechDataBox\Request\PDZInfo();
$input->setSender(($type == 'ovm' ? $config['ovm']['id'] : $config['fo']['id']));
$res = $manager->PDZInfo($account, $input);
if ($res->getStatus()->isOk()) {
    $console->writeln(' -> OK');
} else {
    $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
}
/*********************************************************/
$console->write('   - zjistovani informaci o stavu creditu');
/** @var \HelpPC\CzechDataBox\Response\DataBoxCreditInfo $res */
$input = new \HelpPC\CzechDataBox\Request\DataBoxCreditInfo();
$input->setDataBoxId(($type == 'ovm' ? $config['ovm']['id'] : $config['fo']['id']))
    ->setFromDate((new \DateTimeImmutable())->modify('-3 month'))
    ->setToDate((new DateTimeImmutable()));
$res = $manager->DataBoxCreditInfo($account, $input);
if ($res->getStatus()->isOk()) {
    $console->writeln(' -> OK ' . sprintf('aktualni stav je %s', $res->getCurrentCredit()));
} else {
    $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
}
/*********************************************************/
$console->write('   - GetDataBoxActivityStatus');
$input = new \HelpPC\CzechDataBox\Request\GetDataBoxActivityStatus();
$input->setDataBoxId(($type == 'ovm' ? $config['ovm']['id'] : $config['fo']['id']))
    ->setFrom((new \DateTimeImmutable())->modify('-3 month'))
    ->setTo((new DateTimeImmutable()));
/** @var \HelpPC\CzechDataBox\Response\GetDataBoxActivityStatus $res */
$res = $manager->GetDataBoxActivityStatus($account, $input);
if ($res->getStatus()->isOk()) {
    $console->writeln(' -> OK');
} else {
    $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
}
/*********************************************************/
$console->write('   - zjistovani informaci o datovem trezoru');
$input = new \HelpPC\CzechDataBox\Request\DTInfo();
$input->setDataBoxId(($type == 'ovm' ? $config['ovm']['id'] : $config['fo']['id']));
/** @var \HelpPC\CzechDataBox\Response\DTInfo $res */
$res = $manager->DTInfo($account, $input);
if ($res->getStatus()->isOk()) {
    $console->writeln(' -> OK');
} else {
    $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
}
/*********************************************************/
$console->write('   - zjistovani, zda muze subjekt odesilat postovni datove zpravy');
$input = new \HelpPC\CzechDataBox\Request\PDZSendInfo();
$input->setDataBoxID(($type == 'ovm' ? $config['ovm']['id'] : $config['fo']['id']));
/** @var \HelpPC\CzechDataBox\Response\PDZSendInfo $res */
$res = $manager->PDZSendInfo($account, $input);
if ($res->getStatus()->isOk()) {
    $console->writeln(' -> OK - subjekt ' . ($res->isResult() ? 'muze' : 'nemuze') . ' odesilat PDZ');
} else {
    $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
}
/*********************************************************/
$console->write('   - vyhledavani osobnich DS pro OVM');
$input = new \HelpPC\CzechDataBox\Request\FindPersonalDataBox();
$input->setOwnerInfo((new \HelpPC\CzechDataBox\Entity\PersonalOwnerInfo()));
$input->getOwnerInfo()->setDataBoxId($config['fo']['id']);
/** @var \HelpPC\CzechDataBox\Response\FindPersonalDataBox $res */
$res = $manager->FindPersonalDataBox($account, $input);
if ($res->getStatus()->isOk()) {
    $console->writeln(' -> OK  nalezeno celkem ' . $res->getRecord()->count() . ' subjektu');
} else {
    $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
}
/*********************************************************/
$console->write('   - GetDataBoxList');
$input = new \HelpPC\CzechDataBox\Request\GetDataBoxList();
$input->setType(\HelpPC\CzechDataBox\Utils\DataBoxStatus::ALL);
/** @var \HelpPC\CzechDataBox\Response\GetDataBoxList $res */
$res = $manager->GetDataBoxList($account, $input);
if ($res->getStatus()->isOk()) {
    $console->writeln(' -> OK');
} else {
    $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
}