<?php
use JeroenDesloovere\VCard\VCard;

class VcardExport
{

    public function contactVcardExportService($sonuc)
    {
        require_once 'Transliterator.php';
        require_once 'VCard.php';
        // define vcard
        $vcard = new VCard();

        $firstname = $sonuc['personel_ad'];
        $lastname = $sonuc['personel_soyad'];
        
        $additional = '';
        $prefix = '';
        $suffix = '';


        $vcard->addName( $lastname,$firstname,$additional, $prefix, $suffix);

        // add work data
        $vcard->addCompany($sonuc['firma_adi']);
        $vcard->addJobtitle($sonuc['personel_pozisyon']);
        
        $vcard->addEmail($sonuc['firma_email'], 'PREF;WORK');
        $vcard->addPhoneNumber($sonuc['personel_tel'], 'PREF;CELL');
        $vcard->addPhoneNumber($sonuc['firma_telefon'], 'PREF;WORK');
        
        $vcard->addAddress($sonuc['firma_adres'],'','','','','','',"WORK");
        $vcard->addAddress($sonuc['personel_adres'],'','','','','','',"HOME");
        
        $vcard->addURL($sonuc['firma_website']);
        $vcard->addEmail($sonuc['personel_email'], 'PREF;HOME');

        
        $vcard->addPhoto(__DIR__ . '/personel/'.$sonuc['personel_resim']);
        
        
        // return vcard as a string
        //return $vcard->getOutput();
        
        // return vcard as a download
        return $vcard->download();
        
        
        
    }
}
