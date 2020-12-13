## Sources
https://www.youtube.com/watch?v=FymgHnWUMg4&ab_channel=JohnMorris  --> creating a webshop in PHP 
https://johnmorrisonline.com/build-php-login-form-using-sessions/  --> session
https://stackoverflow.com/questions/10097887/using-sessions-session-variables-in-a-php-login-script  --> session


# OSNOVNE STORITVE

## SPLETNI VMESNIK | ADMIN #Delamo potem, ko se nareita stranka in prodajalec
- [ ] Prijavo in odjavo. Dostop je dovoljen le odjemalcem, ki se overijo s pomočjo certifikatov X.509;
- [ ] Posodobitev lastnega gesla in ostalih atributov;
- [ ] Ustvarjanje, aktiviranje in deaktiviranje uporabniškega računa Prodajalec ter posodobitev njegovih atributov. (Deaktivirati nek podatkovni objekt pomeni, da deluje kot da bi bil izbrisan: denimo deaktiviran uporabnik se ne more prijaviti v sistem, vendar se njegovi podatki v sistemu še vedno nahajajo, deaktiviranega artikla ne prikažemo v prodajali in podobno. Takšno deaktivacijo imenujemo tudi "mehki izbris".)

-> dodaj boolean atribut za preverjanje stanja aktivnosti, false ni aktiven in izdelka ne prikazujemo na strani, prodajalec se pa ne more prijavit.

V vlogi administratorja imate lahko zgolj enega uporabnika, ki ga lahko kreirate ročno, denimo z uporabo določene skripte, vmesnika phpmyadmin in podobno.

## SPLETNI VMESNIK | PRODAJALEC #Ami
- [ ] Prijavo in odjavo. Dostop je dovoljen le odjemalcem, ki se overijo s pomočjo certifikatov X.509;
- [ ] Posodobitev lastnega gesla in ostalih atributov;
- [ ] Obdelavo naročil. Slednje obsega:
  - [ ] Pregled še neobdelanih naročil in njihovih postavk. Posamezno naročilo se prodajalcu prikaže šele, ko Stranka z nakupom zaključi;
  - [ ] Potrjevanje ali preklic oddanih naročil;
  - [ ] Ogled zgodovine potrjenih naročil in možnost storniranja potrjenih naročil.
- [-] Ustvarjanje, aktiviranje in deaktiviranje artiklov in posodabljanje njihovih atributov. Pri obravnavi artiklov lahko upravljanje z zalogami izpustite. Z drugimi besedami -- v aplikaciji lahko vedno predpostavite, da je na zalogi dovolj artiklov;
- [ ] Ustvarjanje, aktiviranje in deaktiviranje uporabniških računov tipa Stranka in posodabljanje njegovih atributov.


<b>Razlaga statusa naročila:</b>

- Neobdelano naročilo je naročilo, ki ga je Stranka oddala.
- Potrjeno naročilo je naročilo, ki ga je Stranka oddala, Prodajalec pa potrdil.
- Preklicano naročilo je naročilo, ki ga je Stranka oddala, Prodajalec pa preklical.
- Stornirano naročilo je naročilo, ki ga je Stranka oddala, Prodajalec potrdil in naknadno storniral tj. stornirati je mogoče le potrjena naročila.


## SPLETNI VMESNIK | STRANKA #Miha đaner
- [-] Prijavo in odjavo;
- [-] Posodobitev lastnega gesla in ostalih atributov;
- [-] Nakupovanje. To naj bo sestavljeno iz:
  - [-] Pregledovanja artiklov trgovine;
  - [-] Dodajanja in odstranjevanja artiklov v košarico ter spreminjanja količine v košarici;
   - [-] Zaključka nakupa. Tu se naj stranki prikaže povzetek kupljenih izdelkov s predračunom. Ko stranka naročilo potrdi, se to doda v čakalno vrsto neobdelanih naročil, kjer ga lahko v obravnavo prevzame Prodajalec.
- [ ] Dostop do seznama preteklih nakupov. Uporabnik lahko vidi vsa svoja pretekla naročila: oddana, potrjena, preklicana in stornirana.
- [ ] Uporaba vmesnika Stranka je dovoljena le preko zavarovanega kanala. Odjemalca overite z uporabniškim imenom in geslom, ki naj bosta shranjena v SUPB.


## SPLETNI VMESNIK | GOST
- [-] Pregledovanje artiklov preko spletnega vmesnika;
- [-] Registracijo preko spletnega vmesnika;
- [-] Uporaba vmesnika anonimnega odjemalca je preko javnega in zavarovanega kanala, pri registraciji pa nujno preklopite na zavarovan kanal. V splošnem poskrbite za ustrezno preklapljanje med omenjenima kanaloma.



## VMESNIK MOBILE APP (android)
zdelajte Android aplikacijo, ki bo omogočala preprosto pregledovanje artiklov v vaši trgovini.

- [ ] Implementirajte vmesnik spletne storitve, preko katerega bo mobilna aplikacija komunicirala z vašo prodajalno;
- [ ] Implementirajte funkcionalnost brskanja po artiklih. Implementirajte vsaj dva zaslona:
  - [ ] Prvi zaslon naj prikaže seznam vseh artiklov v trgovini;
  - [ ] Če uporabnik izbere artikel s zgornjega seznama, naj aplikacija prikaže drug zaslon, kjer se izpišejo podrobnosti artikla.



# RAZŠIRJENE STORITVE


Z implementacijo razširjenih storitev lahko zvišate oceno. Pri vsaki storitvi je navedeno, kolikšen delež ocene prinaša. Pri tem je pomembno, da lahko za razširjene storitve dobite <b>največ 50%</b>. Slednje pomeni, da v kolikor izgubite točke pri osnovnih storitvah, jih z razširjenimi storitvami ne morete kompenzirati.


## VARNOSTNE STORITVE
- [ ] <b>V1</b> (5%) Registracija strank z uporabo filtriranja CAPTCHA.  https://www.a2zwebhelp.com/registration-form-with-captcha
- [ ] <b>V2 (5%)</b> Registracija strank z uporabo potrditvenega e-maila.


## UPORABNIŠKI VMESNIK
- [ ] <b>V1 (do 6%)</b> Smiselna organizacija in izvedba uporabniškega vmesnika s pomočjo tehnologij kot so sta CSS in JavaScript. Za polno oceno je nujna tudi uporaba tehnologij, ki omogočajo asinhrono komunikacijo s strežnikom v ozadju in dinamično posodabljanje DOM; denimo tehnologije AJAX, Vue.js in podobno.
- [ ] <b>V2 (7%)</b> Predstavitev artiklov s slikami. Slike lahko shranite v SUPB ali na datotečni sistem. Za polno oceno mora implementacija podpirati dodajanje in spreminjanje slik na enak način kot se spreminjajo ostali atributi artiklov ter možnost, da za vsak artikel dodamo več slik.
- [ ] <b>V3 (3%)</b> Implementacija iskanja po artiklih. Iskalnik naj podpira binarno iskanje, tj. poizvedbe pri katerih lahko s posebnimi operatorji določene iskalne pojme izključimo.
- [ ] <b>V4 (4%)</b> Implementacija ocenjevanja artiklov prijavljenega uporabnika ter predstavitev njihove povprečne ocene pri njihovem ogledu.


## NAPREDNE FUNKCIJE MOBILNE APLIKACIJE

Mobilno aplikacijo razširite, tako da bo podpirala naslednje funkcije vloge Stranka:

- [ ] <b>A1 (5%)</b> Prijava in odjava.
- [ ] <b>A2 (5%)</b> Pregled profilnih podatkov (ime, priimek, email, geslo, naslov ipd.) ter možnost njihovega spreminjanja.
- [ ] <b>A3 (3%)</b> Prikaz slik artiklov (predpogoj je implementacija UI2; za polno oceno je potreben prikaz vseh slik).
- [ ] <b>A4 (7%)</b> Izvajanje nakupa. Implementirajte zaslon, kjer boste prikazali vsebino nakupovalne košarice skupaj z ustreznimi kontrolami za manipulacijo artiklov v košarici ter dialogom, kjer bo uporabnik lahko nakup tudi zaključil.
- [ ] <b>A5 (3%)</b> Sinhronizacija nakupovalne košarice. (Predpogoj je A4.) Nakupovalna košarica naj bo sinhronizirana z računom prijavljenega uporabnika. Na primer, če je uporabnik prijavljen v mobilno in v spletno aplikacijo hkrati, naj bo vsebina nakupovalne košarice v obeh vmesnikih ista. Pri tem vam ni treba skrbeti, da se vsebina košarice oz. grafični vmesnik samodejno osvežuje, temveč lahko od uporabnika zahtevate, da vsebino košarice ročno osveži.
- [ ] <b>A6 (3%)</b> Pregled preteklih nakupov. Implementacija naj obsega tako pregled seznama vseh nakupov kot tudi ogled podrobnosti posameznega nakupa kot so seznam artiklov, končni znesek ipd.


# KONČNI IZDELEK JE ZGRAJEN IZ
- Android App
- Sletna trgovina
- Podatkovna baza
- Certifikati
- Apache serve?


# Pravila udeležencev
- Delo poteka v skupini z največ tremi udeleženci.
- <b>Od vsakega člana ekipe se zahteva enakomerni doprinos k delu.</b>
- Če delate seminarsko nalogo sami, vam implementacija osnovnih storitev prinese 70% (in ne 50%). Preostalih 30% pridobite z implementacijo razširjenih storitev, pri čemer lahko spletni del obsega največ 15%, delež Android pa ni omejen.


# Končno poročilo

Izdelajte končno poročilo po predlogi, ki je objavljena v spletni učilnici. V poročilu na kratko podajte:

- Seznam implementiranih razširjenih storitev. V kolikor je kakšna implementacija delna, navedite njen obseg;
- Opis podatkovnega modela, kjer pojasnite neočitne atribute;
- Avtorstvo delov naloge glede na člane skupine;


# Oddaja dela in zagovor

Končno poročilo, shemo podatkovne baze s podatki in vso programsko kodo oddajte preko spletne učilnice.

Skrajni rok oddaje je ponedeljek, <b>21. 12. 2020, ob 7:55.</b>

Zagovori bodo potekali med <b>21. in 24. 12.</b> preko konferenčnega sistema Zoom. Konkretni termini zagovorov bodo podani naknadno.

Na zagovoru boste rešitev demonstrirali. Avtor implementacije posamezne storitve naj ima v predstavitvi glavno besedo, tj. kdor naredi, ta
