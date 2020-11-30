# OSNOVNE STORITVE

## SPLETNI VMESNIK | ADMIN
- [ ] Prijavo in odjavo. Dostop je dovoljen le odjemalcem, ki se overijo s pomočjo certifikatov X.509;
- [ ] Posodobitev lastnega gesla in ostalih atributov;
- [ ] Ustvarjanje, aktiviranje in deaktiviranje uporabniškega računa Prodajalec ter posodobitev njegovih atributov. (Deaktivirati nek podatkovni objekt pomeni, da deluje kot da bi bil izbrisan: denimo deaktiviran uporabnik se ne more prijaviti v sistem, vendar se njegovi podatki v sistemu še vedno nahajajo, deaktiviranega artikla ne prikažemo v prodajali in podobno. Takšno deaktivacijo imenujemo tudi "mehki izbris".)

V vlogi administratorja imate lahko zgolj enega uporabnika, ki ga lahko kreirate ročno, denimo z uporabo določene skripte, vmesnika phpmyadmin in podobno.

## SPLETNI VMESNIK | PRODAJALEC
- [ ] Prijavo in odjavo. Dostop je dovoljen le odjemalcem, ki se overijo s pomočjo certifikatov X.509;
- [ ] Posodobitev lastnega gesla in ostalih atributov;
- [ ] Obdelavo naročil. Slednje obsega:
  - [ ] Pregled še neobdelanih naročil in njihovih postavk. Posamezno naročilo se prodajalcu prikaže šele, ko Stranka z nakupom zaključi;
  - [ ] Potrjevanje ali preklic oddanih naročil;
  - [ ] Ogled zgodovine potrjenih naročil in možnost storniranja potrjenih naročil.
- [ ] Ustvarjanje, aktiviranje in deaktiviranje artiklov in posodabljanje njihovih atributov. Pri obravnavi artiklov lahko upravljanje z zalogami izpustite. Z drugimi besedami -- v aplikaciji lahko vedno predpostavite, da je na zalogi dovolj artiklov;
- [ ] Ustvarjanje, aktiviranje in deaktiviranje uporabniških računov tipa Stranka in posodabljanje njegovih atributov.


<b>Razlaga statusa naročila:</b>

- Neobdelano naročilo je naročilo, ki ga je Stranka oddala.
- Potrjeno naročilo je naročilo, ki ga je Stranka oddala, Prodajalec pa potrdil.
- Preklicano naročilo je naročilo, ki ga je Stranka oddala, Prodajalec pa preklical.
- Stornirano naročilo je naročilo, ki ga je Stranka oddala, Prodajalec potrdil in naknadno storniral tj. stornirati je mogoče le potrjena naročila.


## SPLETNI VMESNIK | STRANKA
- [ ] Prijavo in odjavo;
- [ ] Posodobitev lastnega gesla in ostalih atributov;
- [ ] Nakupovanje. To naj bo sestavljeno iz:
 - [ ] Pregledovanja artiklov trgovine;
 - [ ] Dodajanja in odstranjevanja artiklov v košarico ter spreminjanja količine v košarici;
 - [ ] Zaključka nakupa. Tu se naj stranki prikaže povzetek kupljenih izdelkov s predračunom. Ko stranka naročilo potrdi, se to doda v čakalno vrsto neobdelanih naročil, kjer ga lahko v obravnavo prevzame Prodajalec.
- [ ] Dostop do seznama preteklih nakupov. Uporabnik lahko vidi vsa svoja pretekla naročila: oddana, potrjena, preklicana in stornirana.
- [ ] Uporaba vmesnika Stranka je dovoljena le preko zavarovanega kanala. Odjemalca overite z uporabniškim imenom in geslom, ki naj bosta shranjena v SUPB.


## SPLETNI VMESNIK | GOST
- [ ] Pregledovanje artiklov preko spletnega vmesnika;
- [ ] Registracijo preko spletnega vmesnika;
- [ ] Uporaba vmesnika anonimnega odjemalca je preko javnega in zavarovanega kanala, pri registraciji pa nujno preklopite na zavarovan kanal. V splošnem poskrbite za ustrezno preklapljanje med omenjenima kanaloma.



## VMESNIK MOBILE APP (android)
zdelajte Android aplikacijo, ki bo omogočala preprosto pregledovanje artiklov v vaši trgovini.

- [ ] Implementirajte vmesnik spletne storitve, preko katerega bo mobilna aplikacija komunicirala z vašo prodajalno;
- [ ] Implementirajte funkcionalnost brskanja po artiklih. Implementirajte vsaj dva zaslona:
 - [ ] Prvi zaslon naj prikaže seznam vseh artiklov v trgovini;
 - [ ] Če uporabnik izbere artikel s zgornjega seznama, naj aplikacija prikaže drug zaslon, kjer se izpišejo podrobnosti artikla.

