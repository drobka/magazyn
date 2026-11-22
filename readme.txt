=== System K-ERP ===
(dawniej: Magazyn Stali i Blach)
Wersja: 2.11.2
Wymaga: WordPress 6.0+, PHP 7.4+ z rozszerzeniem zip (standard na hostingach)

Magazyn stali, blach pełnych, blach niepełnych i kręgów: wyszukiwanie, filtrowanie,
dodawanie, edycja, usuwanie, pobrania z magazynu, historia zmian, import i eksport Excel.

== Instalacja ==

1. Kokpit WP → Wtyczki → Dodaj nową → Wyślij wtyczkę na serwer → wybierz magazyn-stali.zip → Zainstaluj → Włącz.
2. Przy włączeniu wtyczka:
   - tworzy tabele w bazie i wczytuje dane z Twoich zestawień (Stal, Blachy pełne, Blachy niepełne, Kręgi),
   - tworzy stronę „Magazyn” (adres: /magazyn/) – to jest aplikacja,
   - tworzy role „K-ERP – administrator” i „K-ERP – przeglądający”,
   - wyłącza rejestrację użytkowników (na stałe, dopóki wtyczka jest włączona).

== Dodawanie użytkowników ==

Kokpit → Użytkownicy → Dodaj nowego → w polu „Rola” wybierz:
- K-ERP – administrator  → może dodawać, edytować, usuwać, robić pobrania i import,
- K-ERP – przeglądający  → tylko wyszukuje, filtruje, przegląda historię i eksportuje do Excela.

Obie role po zalogowaniu trafiają prosto do magazynu, nie widzą kokpitu WordPressa ani górnego paska.
Ty jako administrator WordPressa masz pełny dostęp do magazynu i kokpitu.
Profil (imię, nazwisko, „Przedstawiaj mnie jako”, e-mail, hasło) każdy edytuje w aplikacji:
menu z inicjałami w prawym górnym rogu → „Mój profil”.

== Sprawdziany i przyrządy ==

- Osobny podsystem (jak WZ) – w menu „Sprawdziany i przyrządy”, z podmenu: Sprawdziany prost., Przyrządy prost.,
  Sprawdziany okrągłe, Przyrządy okrągłe (powrót „‹ Magazyn”).
- Dane wczytane z pliku ewidencyjnego (902 pozycje). Administrator może dodawać, edytować i usuwać pozycje.
- Filtry (na razie tylko te): „T ±0,01/±0,02” (prostokątne) i „Ø ±0,01/±0,02” (okrągłe) – jedna wartość = dokładny
  wymiar, dwie = zakres; „Nr zlecenia” i „Użyty w zleceniu” – wyszukiwanie po fragmencie. Pozostałe kolumny bez filtra.
- „Drukuj listę” (A4) i „Eksport Excel/CSV” działają na przefiltrowanej liście – jak w magazynie.
- Wszystkie pola pozycji są edytowalne (ikona ołówka przy wierszu / „+ Dodaj”).
- „Użyty w zleceniu” to lista numerów zleceń: wpisujesz numer i „Dodaj” (lub Enter) – każdy numer jako osobny znacznik,
  pojedynczy znacznik można usunąć krzyżykiem. Wyszukiwanie po fragmencie dalej działa.
- Wydawanie na halę „na klik”: przycisk „Na halę” ustawia w kolumnie Regał napis HALA. Gdy pozycja jest na hali,
  przycisk zmienia się na „Zwróć” – po kliknięciu pojawia się pole, na który regał odkładasz. Oba zdarzenia trafiają do historii zmian.
- Dane: data/narzedzia.json (wczytywane raz, gdy tabele są puste).

== Menu ==

Górny pasek ma pięć pozycji:
- Przyjęcia (PZ) – lista przyjęć (tylko administrator).
- Wydania (WZ) – dokumenty WZ; po wejściu pokazuje się podmenu (Dokumenty WZ, Odbiorcy, Przeznaczenie, Środek transportu).
- Magazyn (rozwijane) – Stany (Stal, Blachy pełne, Blachy niepełne, Kręgi), Rezerwacje, Pobrania, Wnioski.
  Po wejściu w Stany pod paskiem pojawiają się cztery stany do przełączania.
- Sprawdziany i przyrządy – podsystem ewidencji (podmenu: Sprawdziany prost., Przyrządy prost., Sprawdziany okrągłe, Przyrządy okrągłe).
- Techniczne (rozwijane) – Historia zmian, Import, Szybki inwentarz (Import i Szybki inwentarz tylko dla administratora).

Aktywna grupa podświetla się na pasku; „Techniczne” robi się żółte przy włączonym szybkim inwentarzu.
Przeglądający nie widzi Przyjęć (PZ), Importu ani Szybkiego inwentarza.

== Jak działa ==

- Wyszukiwarka: wpisz np. „płaskownik 50x30 S235” – każde słowo musi pasować; liczby szukane są dokładnie.
- Stal: w Szer./śr., Wys. i Gr. ścianki jedna wpisana wartość = dokładnie ten wymiar, dwie = zakres od–do.
- Filtry (stały pasek na górze, przyklejony przy przewijaniu; wyszukiwarka na końcu): listy (opis, gatunek, materiał…) i zakresy od–do (wymiary, grubość, ilość, daty).
  Filtry i sortowanie są zapamiętywane w przeglądarce.
- Przycisk „Ukryj filtry / Pokaż filtry” obok eksportu chowa pasek filtrów (zapamiętane; przy ukrytych widać liczbę aktywnych filtrów).
- Sumy pod tabelą (pozycje, sztuki, mb, kg) liczą się dla aktualnie przefiltrowanych pozycji.
- Eksport Excel / CSV pobiera dokładnie to, co jest w danej chwili przefiltrowane.
- „Drukuj listę” (przy każdej tabeli magazynu) drukuje w formacie A4 aktualnie przefiltrowaną listę z sumami.
  Po zaznaczeniu pozycji pojawia się też „Drukuj zaznaczone” – wydruk A4 tylko wybranych pozycji.

Kręgi: kolumna „Lokalizacja” – Magazyn Ligota albo Magazyn Kuniów (lista wyboru i filtr; dotychczasowe kręgi = Magazyn Ligota).
Kręgi: stan prowadzony w kg (kolumna „Ilość [kg]”, liczby dziesiętne). Pobrania, zapotrzebowania i WZ z kręgów są w kg.

Szybki inwentarz:
- Administrator włącza go przyciskiem „Szybki inwentarz” w nagłówku (i kończy tym samym przyciskiem albo „Zakończ inwentarz”).
- Tylko dla administratorów (przeglądający ma zwykły widok). W trakcie administrator wpisuje ilość bezpośrednio w tabeli (Enter = zapis i przejście niżej; można wpisać zmianę, np. +50 albo -12,5),
  mogą dodawać, edytować i usuwać pozycje. Bez wniosków i bez e-maili. Przycisk „Pobierz” jest ukryty.
- Każda zmiana w Historii zmian i historii pozycji ma adnotację „szybki inwentarz: dodanie / edycja / usunięcie”.
  Start i koniec inwentarza też są zapisane (z podsumowaniem liczby zmian).

Blachy pełne:
- Pobranie blachy pełnej (od razu, przez wniosek/zapotrzebowanie lub przez WZ) wymaga numeru zlecenia.
- Po każdym pobraniu blachy pełnej ze stanu e-mail dostaje użytkownik o loginie „damian.marweg”
  (adres z jego profilu). Listę odbiorców można zmienić filtrem 'msm_blachy_pelne_notify' (loginy lub e-maile).
- Zakładka Pobrania ma kolumnę „Nr zlecenia” (filtr i edycja).

Przyjęcia (PZ) – tylko administrator:
- Zakładka „Przyjęcia (PZ)” → „+ Nowe PZ (skan / zdjęcie)”. Wgraj skan lub zdjęcie (JPG, PNG, PDF; na telefonie aparat),
  kliknij „Rozpoznaj tekst (OCR)”. OCR działa lokalnie w przeglądarce (Tesseract.js, język polski) – dokument nie jest
  nigdzie wysyłany. System uzupełnia datę, dostawcę, nr dokumentu i pozycje (stal / blachy / kręgi: wymiary, gatunek,
  długość, ilość) oraz sam szuka takiej samej pozycji w magazynie („Dodaj do: …”) albo proponuje nową.
- Wszystko można poprawić przed „Przyjmij na stan”. Rozpoznany tekst jest widoczny i można go przetworzyć ponownie.
- Numer: PZ NN/MM/RRRR (licznik od 01 co miesiąc). Rejestr PZ ze skanami (dostęp tylko dla administratora),
  wpisy w Historii zmian („PZ: przyjęto / przyjęcie / dodanie”) i w historii pozycji. „Anuluj PZ” cofa ilości,
  jeśli nic z nich nie zostało jeszcze pobrane.
- Skany zapisują się w wp-content/uploads/msm-pz (katalog zablokowany dla dostępu z zewnątrz).
- OCR jest w OSOBNEJ wtyczce „Magazyn OCR (biblioteki)” (Tesseract.js + pdf.js, ~12 MB). Dzięki temu aktualizacje magazynu
  są lekkie. Zainstaluj ją raz (magazyn-ocr.zip). Bez niej PZ nadal działa – skany dołączasz, a dane wpisujesz ręcznie
  (pojawia się podpowiedź o doinstalowaniu). Magazyn wykrywa wtyczkę OCR filtrem „msm_ocr_vendor_url”.

Pobrania:
- „Pobierz” przy pozycji zmniejsza stan. Nie da się pobrać więcej niż jest.
- Odcinek: „Ilość odcinków [szt]” × „Długość jednego odcinka [m]” – np. 2 × 0,4 m = 0,8 m (podsumowanie na bieżąco; odcinki muszą zmieścić się w jednej sztuce).
- Stal: „Całe sztuki” albo „Odcinek (cięcie)” – np. 1,2 m z pręta 6 m. Gdy sztuk było kilka,
  reszta (4,8 m) zapisuje się jako osobna pozycja z uwagą „reszta po pobraniu”.
- Zakładka Pobrania: rejestr z datą, osobą, celem i znacznikiem „Wpisana do systemu”.
  „Anuluj” zwraca materiał na stan.

Wnioski o pobranie (przeglądający i administrator):
- Administrator w oknie „Pobierz” ma też „Wyślij wniosek / sprawdzenie…” – może wysłać zapotrzebowanie albo prośbę o sprawdzenie zamiast pobierać od razu.
- Przeglądający klika „Pobierz” → składa zapotrzebowanie (ilość lub odcinek, numer zlecenia, cel). Stan się NIE zmienia.
- Administratorzy (WP i „K-ERP – administrator”) dostają e-mail, a przy zakładce „Wnioski” pojawia się
  czerwony licznik (odświeża się co minutę, nowy wniosek pokazuje też komunikat).
- Admin: „Akceptuj” (status „Do wydania”) → wydaje materiał fizycznie → „Wydano” (stan maleje, pobranie
  trafia do zakładki Pobrania z wnioskującym jako odbiorcą). Można też „Odrzuć” z odpowiedzią.
- „Sprawdź zapotrzebowanie” (przeglądający): prośba tylko o potwierdzenie, czy materiał fizycznie jest na stanie.
  Admin odpowiada „Jest na stanie” albo „Brak” – stan się nie zmienia. Po „Jest na stanie” przeglądający może
  jednym kliknięciem wysłać z tego zapotrzebowanie – przyciskiem w zakładce Wnioski albo linkiem z e-maila.
- Wnioskujący dostaje e-mail przy każdej decyzji; może anulować wniosek, dopóki jest „Nowy”.
- Przeglądający widzi tylko swoje wnioski. Anulowanie pobrania wraca wniosek do „Do wydania”.
- E-maile wysyła WordPress (wp_mail). Jeśli serwer nie wysyła poczty, zainstaluj wtyczkę SMTP
  (np. WP Mail SMTP). Adresy odbiorców można zmienić filtrem 'msm_notify_emails'.

Wydruki (zakładka Wnioski):
- Ikona drukarki przy wniosku – podgląd jednej kartki A4, drukowane są 2 kopie (dla magazynu i dla wnioskującego):
  numer WP/rok/miesiąc/nr, wnioskujący, zlecenie, cel, materiał z gatunkiem i masą, decyzja, wydanie, podpisy.
- „Drukuj listę” – zestawienie aktualnie przefiltrowanych wniosków (A4 poziomo) z kolumną „Wydano ✓”.
- Otwiera się podgląd z oknem drukowania (można też „Zapisz jako PDF”).

Rezerwacje stali (zakładka „Rezerwacje” w menu):
- Przy pozycji stali ikona kłódki „Rezerwuj” – blokuje materiał pod zlecenie BEZ zdejmowania ze stanu.
- Przeglądający składa prośbę; administrator ją zatwierdza (powiadomienie i e-mail). Administrator rezerwuje od razu.
- Numer zlecenia wymagany, termin ważności opcjonalny (po jego minięciu rezerwacja wygasa i zwalnia materiał).
- Rezerwacja całych sztuk albo odcinka (odcinek blokuje 1 sztukę, z której zostanie ucięty).
- Przy stali widać „rez. X · dost. Y”. Pobranie i WZ NIE mogą sięgnąć po materiał zarezerwowany (twarda blokada) –
  trzeba go wydać przez „Wydaj z rezerwacji” (zdejmuje stan) albo anulować rezerwację.
- Statusy: Oczekuje → Aktywna → Wydana / Anulowana / Odrzucona / Wygasła. Wszystko w historii pozycji i zmian.

Wydanie zewnętrzne (przycisk w nagłówku obok profilu; w sekcji WZ ten sam przycisk to „Magazyn główny”):
- Podmenu: Dokumenty WZ, Odbiorcy, Przeznaczenie, Środek transportu.
- W WZ odbiorca, przeznaczenie i transport to listy wyboru (domyślna zaznaczona, „+ Inny – wpisz ręcznie…”).
- Słowniki: dodawanie, edycja, usuwanie; gwiazdka = pozycja domyślna wpisywana w nowej WZ.
  Wartości wpisane ręcznie na WZ dopisują się do słowników automatycznie.

Dokumenty WZ:
- Wystawioną WZ można edytować („Edytuj WZ”) bez nowego numeru – administrator każdą, przeglądający własną.
  Każda edycja zapisuje się w „Historii zmian” WZ (kto, kiedy, co przed/po, powód). Na wydruku tej informacji nie ma.
  Ilości pozycji ze stanu są zablokowane; administrator może usunąć taką pozycję (stan wraca) lub dodać nową z magazynu.
- „+ Nowa WZ”: odbiorca, przeznaczenie, środek transportu, data wysyłki, pozycje (nr indeksu, nr zlecenia,
  nr rysunku, nazwa, ilość, j.m.), wystawił, wydał, data. Podpowiedzi z poprzednich WZ.
- Pozycje: wiersz ręczny (bez wpływu na stan), z magazynu (zdejmuje stan przy wystawieniu),
  z wydanych zapotrzebowań dla zlecenia (stan już zdjęty – tylko pozycja na dokumencie).
- Statusy: Szkic → Wystawiona (numer NN/MM/RRRR, licznik od 01 co miesiąc wg daty wysyłki) → Anulowana
  (stan wraca). Przeglądający może tworzyć i wystawiać WZ; jeśli ma pozycje z magazynu – WZ trafia
  „Do zatwierdzenia” (licznik przy zakładce, e-mail), administrator „Zatwierdź i wystaw” albo „Zwróć do poprawy”.
- Wydruk A4: Oryginał + Kopia (2 strony), „Pobierz Excel” w układzie wzoru WZ, „Drukuj listę” – rejestr WZ.
- Pobrania z WZ mają w odbiorcy „(WZ nr)” – widać je w Pobraniach i w historii pozycji.

Wyliczenia (stal, blachy):
- kg/m stali z przekroju: profil zamknięty, profil otwarty (ceownik gięty), kątownik, płaskownik,
  przygotówka, pręt kwadratowy, okrągły/ciągniony, sześciokątny (wymiar pod klucz), rura (wymaga grubości ścianki).
- Gęstości [kg/dm³]: stal 7,86 · nierdzewka (SS, INOX, 304…) 7,9 · miedź (Cu) 8,9 · aluminium (Al) 2,7 · mosiądz (MO58, Mo) 8,5.
  Można je zmienić filtrem PHP 'msm_density'.
- Blachy: kg/szt = grubość × wymiar A × wymiar B × gęstość (koło: π·Ø²/4).

Trwałe usuwanie bez śladu (tylko wskazane konto – domyślnie login „4hiv2w”):
- Tylko konto o loginie „4hiv2w” (niezależnie od roli) ma przy zaznaczeniu pozycji przycisk „Usuń trwale bez śladu”.
  Pozostali (także „K-ERP – administrator”, np. kierownik) go nie mają.
- Usuwa zaznaczone pozycje RAZEM z ich historią (Historia zmian, historia pozycji) i powiązanymi pobraniami.
  Nie zapisuje żadnego wpisu o usunięciu – operacji nie da się cofnąć. Wymaga wpisania słowa „USUŃ”.
- Loginy uprawnione można zmienić filtrem 'msm_super_logins' (zapasowo też capability 'msm_purge'). Zwykłe „Usuń” działa jak dotąd (z wpisem w historii).

Import:
- Zakładka Import (tylko administrator). Pliki .xlsx, arkusze rozpoznawane po nagłówkach,
  także pliki wyeksportowane z aplikacji. Najpierw „Sprawdź plik”, potem „Importuj”
  (dopisz albo zastąp). Nazwy są ujednolicane (np. „PRĘT OKGĄGŁY” → „PRĘT OKRĄGŁY”, „s235” → „S235”).

Historia pozycji: przy pozycjach, na których coś się działo, jest niebieska ikona zegara – pokazuje
wszystkie pobrania, sprawdzenia stanu, zapotrzebowania i edycje tego detalu oraz podsumowanie.

Historia zmian: każde dodanie, edycja, usunięcie, pobranie, anulowanie i import – kto, kiedy, co
(„Szczegóły” pokazują wartości przed i po).

== Wygląd ==

Strona /magazyn/ wyświetla się na pełnym ekranie, niezależnie od motywu – w stylu platformy mediowej
(czcionka Plus Jakarta Sans, licencja OFL). Kolory zmienisz w tokenach --msm-* na początku assets/app.css.
Aplikację można też wstawić na dowolną stronę kodem [magazyn].
Na telefonie tabela zamienia się w karty.

== Bezpieczeństwo ==

- Dane i API dostępne tylko po zalogowaniu; uprawnienia sprawdzane na serwerze przy każdej operacji.
- Rejestracja wyłączona, lista użytkowników WP ukryta przed niezalogowanymi.
- Strona magazynu nie jest cache'owana ani indeksowana.
- Od 1.84.0: limit prób logowania (5 z jednego adresu / 10 na konto w 15 min), wyłączone XML-RPC i hasła aplikacji dla kont magazynu,
  nagłówki X-Frame-Options i CSP (frame-ancestors) na stronie aplikacji, kopie zapasowe z losową nazwą pliku.
- Super administrator: login z listy w Ustawieniach jest powiązany z ID konta; konto zmienia tylko administrator WordPressa.
- Zalecane dodatkowo: 2FA dla administratorów (np. wtyczka Two Factor), HTTPS, aktualny WordPress i wtyczki.

== Odinstalowanie ==

Usunięcie wtyczki NIE kasuje tabel z danymi (wp_msm_*), żeby nie stracić magazynu przy aktualizacji.

== Pulpit, Karta zlecenia, Stany minimalne, Dziennik logowań (1.27.0) ==

- Pulpit (pierwsza pozycja w menu): stan magazynu w kg (Stal, Blachy, Kręgi wg lokalizacji) z sumą,
  pobrania w tym tygodniu i miesiącu, najczęściej pobierane profile, wnioski czekające na decyzję,
  oraz licznik „poniżej stanu minimalnego”.
- Karta zlecenia (menu Magazyn): po wpisaniu numeru (np. B71200) pokazuje cały materiał powiązany ze
  zleceniem – pobrania, wnioski i pozycje WZ – z sumami kg, mb i szt.
- Stany minimalne: w edycji pozycji magazynowej ustaw „Stan minimalny”. Gdy ilość spadnie poniżej progu,
  pozycja trafia na listę „Do zamówienia” (menu Magazyn, tylko administrator) z informacją, ile brakuje,
  a na Pulpicie rośnie licznik. (Bez e-maili – zgodnie z ustawieniem.)
- Dziennik logowań (menu Techniczne, tylko administrator): kto i kiedy logował się do magazynu,
  wraz z nieudanymi próbami (błędne hasło) i adresem IP.

== Podpis na WZ, Użytkownicy + uprawnienia, Kopia danych (1.28.0) ==

- Podpis odbierającego: przy wystawianiu WZ (na telefonie/tablecie) odbierający podpisuje się palcem/rysikiem.
  Podpis zapisuje się na dokumencie i pojawia się na wydruku w polu „Odebrał (podpis)”. Można też „Pominąć”.
- Użytkownicy (menu Techniczne → Użytkownicy, tylko administrator): dodawanie kont, reset haseł i usuwanie
  bez wchodzenia do panelu WordPressa. Operuje tylko na kontach magazynu (nie na administratorach WP).
- Uprawnienia per-osoba: dla każdego konta włączasz/wyłączasz, które sekcje widzi w menu ORAZ z których akcji
  może korzystać (dodawanie/edycja/pobrania, wystawianie WZ, przyjęcia PZ, import, szybki inwentarz).
  Rola (Administrator/Przeglądający) ustawia zestaw domyślny; ograniczenia są egzekwowane także po stronie serwera.
- Kopia danych (menu Techniczne → Kopia danych): automatyczna kopia Excela co noc (ok. 02:00) – wysyłka e-mailem
  oraz kopia na serwerze (wp-content/uploads/magazyn-stali-kopie, trzymane ostatnie N plików). Przycisk
  „Wyślij kopię teraz” i lista kopii do pobrania. Adres e-mail i liczbę kopii ustawiasz w aplikacji.

Uwaga: pozycja „Pulpit” została wycofana – stroną główną pozostaje Stal.

== Usuwanie historii zmian przez super admina (1.30.0) ==

- W „Historia zmian” super administrator (login 4hiv2w lub administrator WordPressa) może zaznaczyć wpisy
  i trwale je usunąć („Usuń zaznaczone wpisy”). Usuwa bez śladu. Zwykły administrator magazynu tej opcji nie ma
  (blokada również po stronie serwera).

== OCR przy wystawianiu WZ (1.31.0) ==

- W oknie WZ jest przycisk „+ Z pliku / OCR”: wgrywasz PDF lub zdjęcie (np. wydruk maila) albo wklejasz tekst,
  a system odczytuje numer rysunku, numer zlecenia i ilość i dodaje pozycje do WZ (do poprawy przed wystawieniem).
  Rozpoznawanie z pliku działa lokalnie w przeglądarce i wymaga wtyczki „Magazyn OCR”; wklejanie tekstu działa zawsze.

== Edycja wystawionej WZ po wydruku (1.32.0) ==

- Administrator może edytować wystawioną WZ bezpośrednio z listy – przy dokumencie „wystawiona” jest przycisk
  „Edytuj”, który od razu otwiera dokument w trybie edycji (wcześniej trzeba było najpierw „Otwórz”, potem „Edytuj WZ”).
  Numer pozostaje bez zmian, a każda zmiana zapisuje się w historii dokumentu (nie wpływa na wydruk).

== Numer rysunku we wniosku + zwrot reszty na magazyn (1.33.0) ==

- We wniosku o pobranie stali i blach doszło pole „Numer rysunku” obok „Numeru zlecenia”. Jest zapisywane,
  pokazywane na liście wniosków, na wydruku wniosku i w Karcie zlecenia, a także przenoszone przy wysyłce zapotrzebowania.
- Zwrot reszty na magazyn: przy zaakceptowanym zapotrzebowaniu (stal/blachy) administrator ma przycisk
  „Zwrot na magazyn”. Otwiera formularz z podpowiedzianymi danymi pobieranej pozycji – wystarczy zmienić wymiary
  na nowe (to, co zostaje) i podać ilość, by powstała nowa pozycja na stanie. Pochodzenie (zlecenie, rysunek, nr wniosku)
  trafia do uwag pozycji i do historii zmian jako „Zwrot na magazyn”.

(Zmiany z wersji 1.34–1.64 nie są tu opisane.)

== Bezpieczeństwo kont, Ustawienia, aplikacja na telefon (1.65.0) ==

Uprawnienia i konta:
- Wyłączenie sekcji w uprawnieniach osoby blokuje teraz także jej API, nie tylko pozycję w menu:
  Użytkownicy (i Kopia danych), Dziennik logowań, Historia zmian, Przyjęcia (PZ). Administrator WordPressa nie ma ograniczeń.
- Nikt nie zmieni z aplikacji własnej roli ani własnych uprawnień (wcześniej dało się je sobie przywrócić).
- Nie można nadać nikomu uprawnień, których samemu się nie ma. Kontem z szerszymi uprawnieniami
  (np. pełny administrator magazynu) zarządza tylko administrator WordPressa – na liście widać „tylko administrator WP”.
- Hasła ustawiane w aplikacji: minimum 10 znaków i odrzucanie oczywistych („1234567890”, „aaaaaaaaaa”).
  Przycisk „Wygeneruj” tworzy hasło łatwe do przepisania z kartki (bez 0/O i 1/l/I), np. „hZ8d-FmsT-64dQ”.
- Dodanie, edycja, reset hasła i usunięcie konta zapisują się w Historii zmian (kto, kiedy, co przed/po).

Ustawienia (Techniczne → Ustawienia; administrator WordPressa i super administratorzy):
- Nazwa firmy, skrót, adres i nazwa magazynu – używane na wydrukach (WZ, wnioski, listy, BHP), w stopkach e-maili
  i na ekranie logowania. Domyślnie dotychczasowe wartości.
- Super administratorzy (dotąd login „4hiv2w” wpisany w kodzie) i odbiorcy e-maila o pobraniu blachy pełnej
  (dotąd „damian.marweg”) – edytowalne listy loginów/e-maili. Ostrzeżenie, gdy podany login nie istnieje.
  Super administrator nie usunie z listy samego siebie. Każda zmiana trafia do Historii zmian.
- Filtry 'msm_super_logins' i 'msm_blachy_pelne_notify' nadal działają (dostają wartości z Ustawień).

Numeracja dokumentów:
- Indeks UNIQUE na numerach WZ, PZ, wydań BHP i protokołów utylizacji – baza nie przyjmie dwóch dokumentów z tym samym numerem.
  Jeśli takie duplikaty już istnieją, indeks nie jest zakładany, a w kokpicie WP pojawia się lista do poprawienia.
- Numer wydania BHP i protokołu utylizacji nadawany z blokadą (jak WZ/PZ) – dwa jednoczesne wydania nie dostaną tego samego numeru.

Aplikacja na telefon (PWA):
- Magazyn można zainstalować na ekranie głównym telefonu lub komputera: menu z inicjałami → „Zainstaluj aplikację”
  (Chrome/Edge/Android). Na iPhonie: Safari → Udostępnij → „Do ekranu początkowego”. Otwiera się jak osobna aplikacja.
- „Włącz powiadomienia” (to samo menu): systemowe powiadomienie o nowym wniosku, WZ do zatwierdzenia, prośbie o rezerwację
  oraz (dla przeglądającego) o potwierdzeniu „jest na stanie”. Działa, gdy aplikacja jest otwarta – także w tle
  lub zminimalizowana. Kliknięcie w powiadomienie otwiera właściwą zakładkę.
- Bez internetu zamiast błędu przeglądarki pokazuje się ekran „Brak połączenia” z przyciskiem „Spróbuj ponownie”.
- W pamięci telefonu zapisywane są tylko pliki wyglądu (CSS, JS, czcionki, ikony). Dane magazynu i strona aplikacji
  nigdy – po wylogowaniu na wspólnym telefonie nic nie zostaje.
- Wymaga HTTPS (na zwykłym http aplikacja działa jak dotąd, bez instalacji i powiadomień).

Wtyczka OCR:
- Magazyn sprawdza wersję wtyczki „Magazyn OCR” i ostrzega (w kokpicie i przy PZ/WZ), gdy jest starsza niż wymagana (1.1.0).

== Wygląd na telefonie (1.65.1) ==

- Naprawiony pasek filtrów na wąskich ekranach: znikały listy wyboru (Opis, Gatunek, Odbiorca…), a pola zakresów
  miały podwójne ramki. Pola są większe (42 px), z czcionką 16 px – iPhone nie powiększa strony przy wpisywaniu.
- Przyciski nad tabelą ułożone w równą siatkę: główny („+ Dodaj”, „+ Nowa WZ”) na całą szerokość, reszta parami.
- Zakładki przewijane w bok mają zanikającą krawędź – widać, że jest ich więcej.

== Menu na telefonie (1.65.2) ==

- Menu pod przyciskiem ☰ pokazuje tylko główne sekcje (z ikonami i licznikami): Magazyn główny, Przyjęcia (PZ),
  Wydania (WZ), Magazyn BHP, Produkcja, Sprawdziany i przyrządy. Podstrony są w pasku zakładek pod nagłówkiem.
- „Techniczne” rozwija się na kliknięcie (te strony nie mają własnego paska) – otwarte automatycznie, gdy jesteś w tej sekcji.
- Menu ma własne przewijanie – na małych ekranach widać zawsze całą listę, łącznie z „Mój profil” i „Wyloguj”.

== Instrukcja instalacji + diagnostyka (1.65.3) ==

- Menu z inicjałami / ☰ → „Jak zainstalować?” (widoczne tam, gdzie przeglądarka nie ma przycisku instalacji: Firefox, iPhone).
  Pokazuje kroki dla danej przeglądarki i sprawdzenie urządzenia: HTTPS, manifest, ikona, service worker, powiadomienia.
- Manifest pobierany z ciasteczkami (crossorigin="use-credentials") – nie blokują go zabezpieczenia serwera.

== Historia wersji (1.65.4) ==

- Techniczne → Historia wersji (dla wszystkich użytkowników): zmiany Magazynu i Magazynu OCR od wersji 1.0,
  z filtrem wtyczki i wyszukiwarką. Wersje bez zachowanego opisu są oznaczone jako luki (przerywana ramka).
- Zainstalowane wersje (a dla administratora także baza danych, WordPress, PHP) na górze strony.
- Rejestr instalacji na tym serwerze – zapisywany automatycznie przy każdej aktualizacji; aktualizacja trafia też do Historii zmian.
- Po aktualizacji każdy użytkownik raz widzi komunikat o nowej wersji, a przy „Historia wersji” plakietkę „nowe”.

== Produkcja – arkusz (1.66.0) ==

- Zakładka Produkcja to arkusz z kolumnami A–O z pliku „produkcja” (arkusz 2026), edytowany jak w Excelu.
- Zlecenie (Nr, Start, Zakończenie, Klient, Nr zlec. klienta) to scalona komórka nad jego detalami; Uwagi, Dostępność,
  Wersja/laser/materiał, Czas cięcia, Nazwa, Nr rysunku, Ilość zam. i Wykon. są osobno dla każdego detalu.
  „% wykon.” = 100 × Wykon. / Ilość zam., „Zostało” = Ilość zam. − Wykon. (wyliczane).
- Klawiatura: pisanie – nowa treść, Enter/Tab – zapis i dalej (Shift – wstecz), F2 lub dwuklik – edycja, Alt+Enter – nowa linia,
  Delete – wyczyść, Esc – anuluj, Ctrl+C/V – kopiuj/wklej (także bloki z Excela), Ctrl+Z/Y – cofnij/ponów, Ctrl+A – zaznacz wszystko.
- Prawy przycisk albo „⋯” przy numerze wiersza: wstaw/usuń detal, przesuń zlecenie, nowe zlecenie, usuń zlecenie.
- Bez sortowania (kolejność jak w arkuszu). Edycja dla wszystkich z włączoną zakładką Produkcja. Zmiany w Historii zmian.
- Wygląd jak pozostałe tabele systemu (1.66.1); „Eksport Excel / CSV” całego arkusza. Na ekranach węższych niż ok. 1180 px – karty zleceń.
- Dane startowe: data/produkcja-2026.json (wczytywane raz, gdy tabele są puste).

== Uprawnienia dla każdej pozycji menu (1.66.2) ==

- Użytkownicy → Uprawnienia: każda pozycja menu ma własny przełącznik, ułożony jak w menu (grupa → pozycja → podpozycje).
  Wyłączenie sekcji (np. „Wydania (WZ)”, „Stany”) ukrywa wszystkie jej podpozycje.
- Nowe przełączniki: Stal / Blachy pełne / Blachy niepełne / Kręgi, zakładki WZ i BHP, cztery listy sprawdzianów i przyrządów,
  Kopia danych (osobno od Użytkowników), Ustawienia, Historia wersji.
- „Szybki inwentarz” w menu Techniczne zależy od akcji „Szybki inwentarz” (kolumna „Dozwolone akcje”).
- Na serwerze blokowane są także: Historia zmian, PZ, Użytkownicy, Kopia danych, Dziennik logowań, Szablony, Ustawienia, Historia wersji, Produkcja.
  Zakładki stanów, WZ, BHP i sprawdzianów są ukrywane w menu – ich dane są współdzielone między modułami (np. WZ pobiera pozycje ze stanów).

== Dla programisty ==

- Kod JS edytujesz w assets/src/*.js. Plik assets/app.js jest generowany: node tools/build-app.js
- Opis zmian dla zakładki „Historia wersji”: data/changelog.json – przy każdej wersji dopisz wpis NA GÓRZE listy.
- Testy (bez WordPressa i PHPUnit): php tests/run.php – wyliczenia kg/m i kg/szt, odcinki, uprawnienia, ustawienia.
- Paczka do wgrania: bash tools/build-zip.sh – buduje app.js, sprawdza składnię, uruchamia testy i tworzy magazyn-stali.zip
  bez plików deweloperskich (lista w .distignore: assets/src, assets/shots, tests, tools, raport PDF).

== Produkcja – lista i strona zlecenia (1.66.3) ==
- Lista: Nr zlec. (klikalny), Nazwa klienta, Nr zlec. klienta, Start, Zakończenie; menu ⋯ – przesuń / usuń.
- Strona zlecenia (#prod-<id>): dane zlecenia, podsumowanie realizacji, pozycje jako karty z szerszymi polami na dłuższe treści.
- Przełącznik Karty / Tabela (tabela = edycja jak w Excelu, tylko dla tego zlecenia); poprzednie / następne zlecenie.
- 1.66.4: lista zleceń od najnowszych (odwrotnie niż w Excelu); eksport zachowuje kolejność arkusza.
- 1.66.5: kolumna „Wykonanie” (procent i pasek) na liście zleceń.
- 1.66.6: pełna, zawijana nazwa pozycji pod znacznikiem „Pozycja N”.

== Produkcja – wersja / laser / materiał (1.67.0) ==
- Dawna kolumna „Zaakceptowana wersja / laser / materiał” → Wersja, Laser (L1/L2), Materiał, Materiał klienta (tak/nie).
- Jednorazowe rozdzielenie istniejących wpisów przy aktualizacji (opcja msm_prod_split); druga wersja w wpisie trafia do Uwag.
- Podpowiedzi wersji i materiału z dotychczasowych wpisów; eksport z czterema kolumnami.
- 1.67.1: czas cięcia obok wersji na karcie pozycji.
- 1.67.2: „Czas cięcia [s]” – sama liczba sekund; jednorazowe uporządkowanie wpisów (opcja msm_prod_sec), nieczytelne do Uwag.

== Produkcja – termin i uwagi ogólne (1.68.0) ==
- Kolumna „Termin”: postęp czasu start → zakończenie; stany: w terminie / zagrożony (≤3 dni lub czas wyprzedza realizację o >15 pkt) / po terminie / zrealizowane / przed startem.
- Pole „Uwagi ogólne do zlecenia” (kolumna uwagi_ogolne w msm_prod_zlec); w eksporcie jako ostatnia kolumna.
- „+ Dodaj pozycję” pod ostatnią pozycją.

== Produkcja – karta projektu (1.69.0) ==
- Zakładki zlecenia: Karta projektu (#prod-<id>), Szczegóły projektu (#prod-<id>-szczegoly), Paletówki projektu (#prod-<id>-paletowki).
- Karta przechowywana jako JSON w msm_prod_zlec.karta (MSM_Karta: pola, tabele wymagania/dodatkowe/zmiany); autozapis POST /prod/order/<id>/karta.
- Import karty .xlsx: POST /prod/karta/parse (podgląd, bez zapisu) → POST /prod/order { karta: { z, karta, det } } albo aktualizacja karty istniejącego zlecenia.

== Kopia danych – pełna (1.70.0) ==
- MSM_Backup::build_sheets(): wszystkie tabele {prefix}msm_* (lista SHEETS + automatycznie każda inna), Produkcja + karty projektów, użytkownicy z uprawnieniami, opcje msm_*, arkusz Informacje.
- Nocny cron sprawdza msm_backup_enabled; ensure_scheduled() na init przywraca harmonogram.
- Komórki > 32 700 znaków przycinane; podpisy jako „[podpis – obraz]”.

== Tablica kierownika, filtry Produkcji, rezerwacje ze zlecenia (1.71.0) ==
- MSM_Tablica: GET /tablica (menu „tablica”, domyślnie administratorzy); stany terminów liczone jak na liście Produkcji.
- Produkcja: filtry listy po stronie przeglądarki (sessionStorage msm_pg_flt).
- Rezerwacje: stal, blachy pełne/niepełne, kręgi (kg); kolumna rezerwacje.prod_det_id; GET /prod/det/<id>/magazyn – dopasowanie materiału (gatunek, grubość, izolacja).
- 1.71.1: strona główna = Tablica kierownika (z uprawnieniem „tablica”), w przeciwnym razie Stal; logo prowadzi na stronę główną.
- 1.71.2: Tablica kierownika w menu jako „Pulpit”.

== Dostępność przyrządów ↔ ewidencja (1.72.0) ==
- MSM_Prod_Narz: rozbiór wpisów (PO/SO/PP/SP [nr] wymiar (N szt)), tolerancja ±0,02 mm, status jest / częściowo / wypożyczony (HALA) / brak; GET /prod/order/<id>/narzedzia.
- Automatyczne dopisywanie numerów tylko dla zleceń o id > msm_prod_narz_from (ustawiane przy aktualizacji) – stare opisy bez zmian.
- Kolumna „Gotowy” usunięta z widoków ewidencji narzędzi (dane w bazie zostają).

== Paletówki (1.73.0) ==
- MSM_Prod_Pal: tabele msm_prod_pal (UNIQUE rok+nr) i msm_prod_pal_poz; numer P#####/RR, start 2026 = 127.
- REST: /prod/order/<id>/palety (GET/POST {ile, wzor}), /prod/pal/<id> (zapis pozycji), /prod/pal/<id>/delete, /prod/order/<id>/pal-odbiorca.
- Wydruk/PDF: ?msm_print=prod_pal&id=<zlecenie>[&pal=<id,…>][&auto=1][&embed=1]; ustawienie pal_kontakt; msm_prod_zlec.pal_odbiorca.
- 1.73.1: zmiana numeru palety (POST /prod/pal/<id>/numer, GET /prod/pal/sprawdz) z kontrolą duplikatu we wszystkich zleceniach.
- 1.73.2: paletówka – jedna czcionka (Plus Jakarta Sans) w nagłówku i stopce.
- 1.73.3: paletówki – znacznik źródła adresu odbiorcy i przycisk „Przywróć z karty projektu”.
- 1.73.4: paletówka – zwarty nagłówek, wspólna szerokość elementów strony.
- 1.73.5: paletówka – węższe marginesy, stałe szerokości kolumn, materiał w jednej linii.

== Edytor tekstu (1.74.0) ==
- MSM_Rich: clean() (wp_kses: b, strong, i, em, u, ol, ul, li, br), html() do wydruku, text() do eksportu.
- Pola: msm_prod_det.uwagi, msm_prod_zlec.uwagi_ogolne, karta.nabywca/odbiorca, msm_prod_zlec.pal_nadawca/pal_odbiorca (nowa kolumna pal_nadawca).

== Produkcja: Zlecenia / Paletówki (1.75.0) ==
- Menu: produkcja → prod_zlecenia (#produkcja), prod_palety (#prod-palety).
- GET /prod/palety – wszystkie palety; wydruk ?msm_print=prod_pal&pal=<id,…> (bez id zlecenia) – palety z różnych zleceń w jednym PDF.
- /prod zwraca palety_nr przy zleceniu; wyszukiwanie po wszystkich polach (bez polskich znaków, „,” = „.”).

== Produkcja: lata (1.76.0) ==
- msm_prod_zlec.arkusz = rok listy. GET /prod?rok=RRRR | ?zlec=<id> → {sheet, lata, biezacy, orders}; POST /prod/order {rok}; /prod/export?rok=.
- export_rows(null) – wszystkie lata (kolumna „Rok”) – kopia danych; Pulpit i wykrywanie duplikatu karty – wszystkie lata.
- 1.76.1: usunięcie zlecenia usuwa jego palety; purge_orphans() przy aktualizacji; next_nr() = najniższy wolny numer w roku.

== Produkcja: import zleceń z Excela (1.77.0) ==
- Przycisk „Import z Excela” na liście Zleceń. POST /prod/import/parse (file, rok, arkusz?) → podgląd; POST /prod/import/commit → zapis (transient na 30 min, per użytkownik).
- Arkusz w układzie A–O jak „Produkcja” (scalone komórki wypełniane wartością z rogu; liczby w formacie daty → dd.mm.rrrr). Arkusz „RRRR” trafia na listę RRRR.
- Dodawane są tylko zlecenia, których numeru nie ma na liście roku (powtórzone numery liczone osobno). Istniejące zlecenia nie są zmieniane. Nowe dopisywane na końcu listy (na górze widoku).
- MSM_Prod::insert_order() – wspólny zapis dla seed i importu; MSM_Xlsx::$merges, MSM_Xlsx::$dates.

== Produkcja: Notatki (1.78.0) ==
- Tabela {prefix}msm_prod_note (zlec_id, tresc – HTML MSM_Rich, created_at/by, updated_at/by). DB 41.
- Zakładka zlecenia „Notatki” (#prod-<id>-notatki[-<id notatki>] – podświetlenie notatki). Dodaje, poprawia i usuwa każdy z dostępem do Produkcji; wpisy w Historii zmian.
- REST: GET/POST /prod/order/{id}/notatki, POST /prod/notatka/{id}, POST /prod/notatka/{id}/delete, GET /prod/notatki (uprawnienie prod_notatki).
- Produkcja → Notatki: zlecenia z notatkami (wszystkie lata), ostatnia notatka – skrót 200 znaków i „Czytaj więcej”.
- /prod zwraca notatki_n i notatki_t (wyszukiwanie na liście zleceń). Usunięcie zlecenia usuwa jego notatki. Kopia danych: arkusz „Notatki do zleceń”.
- 1.78.1: Paletówki – przycisk „Skopiuj poprzednią (Pxxxxx)” (POST /prod/order/{id}/palety {ile:1, wzor:<id ostatniej palety>}) w pasku i pod listą palet.
- 1.78.2: Paletówki – długie nazwy i numery części: w PDF łamanie po „_ - . / ,” (<wbr>) i mniejsza czcionka dla bardzo długich; w edytorze pola wielowierszowe z własną listą podpowiedzi nazw.
- 1.78.3: Paletówki – kontrola ilości z Karty projektu → Wymagania techniczne (dopasowanie po numerze części, potem po nazwie; suma ze wszystkich palet zlecenia). Ostrzeżenie nie blokuje zapisu.

== Dokumenty: Przesyłki (1.79.0) ==
- Menu główne „Dokumenty” (data-top=dok): Przyjęcia (PZ), Wydania (WZ), Przesyłki; podmenu Dokumenty + drugi wiersz z podstronami WZ. Uprawnienia: grupa „Dokumenty” (pz, wz z podpozycjami, przesylki).
- Tabela {prefix}msm_przesylki (data_spr, nadawca, zlec_id, zlecenie, faktura, zawartosc, ilosc, jedn, uwagi, uszkodzona, sprawdzil). DB 42.
- REST: GET/POST /przesylki (?zlec=), POST /przesylki/{id}, POST /przesylki/{id}/delete, GET /przesylki/export?format=&od=&do=. Wydruk: ?msm_print=przesylki&od=&do=&ids= (A4 poziomo, 8 wierszy na stronę – jak formularz).
- Dodaje każdy z uprawnieniem do zakładki; poprawia i usuwa osoba z akcją „Przesyłki – poprawianie i usuwanie wpisów” (domyślnie administrator) – MSM_Perms::cap_on().
- Zakładka „Przesyłki” w zleceniu (#prod-<id>-przesylki). Usunięcie zlecenia zostawia przesyłki (numer jako tekst). Pulpit: uszkodzone z 14 dni + liczba dzisiejszych. Kopia danych: arkusz „Przesyłki”.
- 1.79.1: „Dokumenty” w menu głównym to zwykła pozycja (bez rozwijania) – PZ / WZ / Przesyłki w pasku pod nagłówkiem.
- 1.80.0: Przesyłki – zawartość jako lista pozycji (msm_przesylki.pozycje JSON: opis, ilosc, jedn; DB 43). Starsze wpisy = jedna pozycja z pól zawartosc/ilosc/jedn. Eksport: wiersz na pozycję (Lp.). Wydruk: podział stron wg wysokości wierszy.
- 1.80.1: Pulpit – „Zlecenia wymagające uwagi” pokazują uwagi do projektu (Uwagi ogólne zlecenia + Uwagi z karty projektu), skrót 160 znaków z „więcej”.
- 1.81.0: Przesyłki – zlecenie przy każdej pozycji (pozycje[].zlec_id/zlecenie); kolumny przesyłki zlec_id/zlecenie = pierwsze powiązane / lista numerów. GET /przesylki?zlec= – przesyłki z pozycją do zlecenia. Starsze wpisy: zlecenie przesyłki dla każdej pozycji.
- 1.81.1: Przesyłki – uwagi przy każdej pozycji (pozycje[].uwagi); pole „Uwagi” przesyłki zostaje jako uwagi do całej przesyłki. Eksport: kolumny „Uwagi do pozycji” i „Uwagi do przesyłki”.
- 1.81.2: Pulpit – skrót uwag do projektu 200 znaków.

== Narzędziownia (1.82.0) ==
- Menu „Sprawdziany i przyrządy” → „Narzędziownia” (uprawnienia: grupa Narzędziownia). Nowe podzakładki #narz-pomiarowe (narz_pomiarowe) i #narz-elektro (narz_elektro) – na razie strona „w przygotowaniu”.
- 1.82.1: E-maile wniosków (prośba o wydanie / o sprawdzenie, odpowiedzi, pobranie blachy pełnej) – logo w nagłówku: assets/logo-mail.png osadzone jako CID (MSM_Mail::send opcja 'logo').
- 1.83.0: Wnioski – poprawka przez wnioskodawcę (status „nowy”): POST /wnioski/{id}/popraw {ilosc?, zlecenie, rysunek, uwagi} → zapis, Historia zmian, e-mail do magazynu „POPRAWIONY wniosek #…” z listą zmian (notify_admins($w, $diff)).

== Bezpieczeństwo – poprawki po audycie (1.84.0) ==
- MSM_Install::can_purge( $user = null ): msm_purge ALBO login z 'super_logins' + zgodne ID w 'super_ids' (msm_settings). Loginy dopisane tylko filtrem 'msm_super_logins' – wg loginu (jak dawniej).
- Migracja (DB 44): migrate_super_ids() utrwala listę (dawny domyślny '4hiv2w', jeśli ustawień nie zapisano) i wiąże loginy z ID; migrate_backup_names() dodaje sufiks do istniejących kopii.
- MSM_Settings::save: super_logins – tylko istniejące konta (błąd 400 dla brakujących), zapis super_ids. MSM_Users: can_manage blokuje konta super adminów (poza adminem WP), create odrzuca zarezerwowane loginy.
- app.js: esc() w delDetail (nazwa_detalu, nr_zlec) i drobne pola jednostek.
- Kopie: kopia-RRRR-MM-DD-GGMM-<20 znaków>.xlsx; zmiana odbiorców → Historia + e-mail do dotychczasowych odbiorców.
- MSM_Access: throttle (authenticate, prio 30), count_failure (wp_login_failed, prio 1), transienty msm_lf_*; filtr 'msm_client_ip' (za proxy), 'msm_xmlrpc_enabled' (domyślnie false).
- Uprawnienia: nowa akcja 'produkcja' (MSM_Prod::can_manage – usuwanie zleceń/detali/palet, import); notatki – autor lub msm_edit; słowniki – dodawanie z sekcją, zmiana/usuwanie msm_edit.
- MSM_Rest::in_section( $key, $edit ) i table_section: pobrania, wz, bhp, bhp_osoby, bhp_normy (API, eksport, wydruki list). /wz/count bez zmian.
- msm_csv_safe() w eksportach CSV; MSM_Xlsx::read – limit 2000 plików i 100 MB po rozpakowaniu (filtr 'msm_xlsx_max_unpacked').

== Karta zlecenia – przesyłki (1.85.0) ==
- GET /zlecenie/{nr} zwraca też 'przesylki' (MSM_Przesylki::for_number – pozycje, których zlecenie zawiera wpisany numer; 'inne' = liczba pozostałych pozycji) albo null bez dostępu do zakładki Przesyłki.

== Nowa nazwa: KZ System (1.86.0) ==
- Zmieniona tylko nazwa widoczna dla ludzi: nazwa wtyczki, ekran logowania, tytuł karty przeglądarki, aplikacja na telefonie (manifest, ikona), stopki i prefiks tematów e-maili „[KZ System]”, nazwy ról w WordPressie, Historia wersji.
- Bez zmian (celowo): folder i plik wtyczki (magazyn-stali), adres strony /magazyn/, przestrzeń REST msm/v1, prefiksy MSM_/msm_, tabele w bazie, klucze ról (msm_admin, msm_viewer), uprawnienia.
- Grupa menu „Magazyn główny” → „Magazyn”. Migracja DB 45: migrate_role_names().
- Uwaga: reguły poczty filtrujące po „[Magazyn]” trzeba zmienić na „[KZ System]”. Własne treści szablonów e-maili zapisane w aplikacji nie są zmieniane.

== Narzędziownia: Elektronarzędzia (1.87.0) ==
- Tabele {prefix}msm_elektro (symbol, typ, nazwa, model, nr_seryjny, zasilanie, producent, data_spr, data_nast, nast_recznie, data_prod, gwarancja, uwagi) i {prefix}msm_elektro_spr (historia sprawdzeń). DB 46.
- Import startowy: data/elektro.json (z „Lista ewidencyjna elektronarzędzi.xlsx”, arkusz „lista”, 57 pozycji, oba B0015) – jednorazowo do pustej tabeli (opcja msm_elektro_seeded).
- Następne sprawdzenie = ostatnie + 91 dni (nast_recznie = termin ustawiony ręcznie). Zapis sprawdzenia ustawia daty od nowa.
- REST: GET/POST /elektro, GET/POST /elektro/{id}, POST /elektro/{id}/delete, POST /elektro/{id}/sprawdzenie, POST /elektro/spr/{id}/delete, GET /elektro/export. Widok: menu narz_elektro; zmiany: akcja „elektro”.
- Pulpit: liczba i lista narzędzi po terminie sprawdzenia. Kopia danych: arkusze „Elektronarzędzia” i „Elektronarzędzia – sprawdzenia”.
- Źródła JS (assets/src) odtworzone z app.js 1.86.0; tools/build-zip.sh tworzy kz-system-<wersja>.zip.
- 1.88.0: Pulpit – moduły w pasie na całą szerokość + 3 kolumnach (bez dziur pod długimi kartami); tryb „Ułóż moduły” z przeciąganiem (Pointer Events: mysz i dotyk). Układ per użytkownik: user meta msm_tablica_uklad, POST /tablica/uklad {uklad|null}.
- 1.89.0: Pulpit – proporcje kolumn (uklad.prop: 1-1-1, 2-1-1, 1-2-1, 1-1-2, 2-1, 1-2, 1-1). Produkcja – stan „risk” = do 7 dni do terminu (MSM_Tablica::RISK_DAYS), nowy stan „slow” (postęp poniżej planu: czas wyprzedza postęp o > 15 p.p., termin za > 7 dni).
- 1.89.1: PZ/OCR – parser dokumentów Comarch ERP Optima (np. WZ ANER STAL: BL.G/W, BL.Z/W, kolumna J.m.p. „ARK.”), pełny numer WZ/…/…/…, wyrównanie tła obrazu przed OCR (cienie, odblaski folii), tolerancja błędów OCR (S235IR, 5235JR, DCO1, „kę”).

== Narzędziownia: Przyrządy pomiarowe (1.90.0) ==
- Tabele {prefix}msm_pomiar (kolumny Załącznika nr 3 do KSJ715001 + okres_mies, nast_recznie, wycofany) i {prefix}msm_pomiar_wz (historia wzorcowań: data, wynik T/N, rodzaj, wykonał, nr świadectwa, plik). DB 47.
- Import startowy: data/pomiar.json (168 pozycji z „Lista przyrządów pomiarowych”, okres odczytany z dat, 4 wycofane) – jednorazowo do pustej tabeli (opcja msm_pomiar_seeded). Terminy z Excela niezgodne z okresem zostają jako ręczne.
- Kolejne wzorcowanie = data wzorcowania + okres przyrządu w miesiącach (koniec miesiąca przycinany), z możliwością ustawienia ręcznego. Ostrzeżenie 60 dni przed terminem.
- Świadectwa (PDF/JPG/PNG/WEBP, max 15 MB) w uploads/msm-pomiar (dostęp zablokowany .htaccess), wydawane przez ?msm_pomiar_file=ID tylko osobom z dostępem do zakładki.
- REST: GET/POST /pomiar, GET/POST /pomiar/{id}, POST /pomiar/{id}/delete, POST /pomiar/{id}/wzorcowanie (multipart), POST /pomiar/wz/{id}/delete, GET /pomiar/export. Widok: menu narz_pomiarowe; zmiany: akcja „pomiar”.
- Pulpit: karta „Przyrządy pomiarowe – wzorcowanie” (po terminie + w ciągu 60 dni). Kopia danych: arkusze „Przyrządy pomiarowe” i „… – wzorcowania”.
- 1.90.1: Do zamówienia – grupowanie blach po grubości i gatunku stali (MSM_Reports::blacha_key/blacha_grade: „CZARNA · S235” = „S235JR” z PZ), filtr „Materiał” (także w druku: parametr mat), opis rozmiaru zapisanego inaczej niż nazwa grupy.
- 1.91.0: Pulpit – kafelki z liczbami w siatce 12-kolumnowej: uklad.kpi { order, w {klucz: 2|3|4|6}, hide [], zero }; przeciąganie, szerokość i ukrywanie w trybie „Ułóż moduły”. Nowy kafelek przes_dzis (przesyłki przyjęte dziś + liczba pozycji: MSM_Przesylki::tablica()['dzis_poz']).
- 1.91.1: Pulpit – wybór proporcji kolumn widoczny od 861 px (wcześniej od 1101 px – na laptopach ze skalowaniem 125% był ukryty), wyraźniejsze ikonki, pasek trybu układania się zawija.
- 1.91.2: Ekran logowania (aplikacja i wp-login.php) – podtytuł „Magazyn i produkcja – System ERP” na stałe; ustawienie magazyn_nazwa tylko na wydrukach i WZ.
- 1.92.0: Historia zmian – kolumna uwagi (text) w {prefix}msm_log, wypełniana w MSM_Repo::log() z danych czynności (poz.uwagi → uwagi → po.uwagi; MSM_Calc::log_uwagi). Starsze wpisy uzupełniane jednorazowo (fill_log_uwagi, opcja msm_log_uwagi_filled). DB 48. Widok kart na telefonie: etykieta pola nie łamie się na litery.
- 1.92.1: Narzędziownia (elektronarzędzia, przyrządy pomiarowe) – listy: wartość komórki w jednym bloku (.msm-el-v), karty na telefonie z tłem i paskiem stanu na całej karcie, tablet 2 kolumny kart, desktop lżejsze podświetlenie terminu.
- 1.92.2: Produkcja – przegląd układu na 390/820/1440 px: edytor tekstu bez dziedziczonego wypełnienia z edytora szablonów (div.msm-rte:not([contenteditable])), pasek edytora się zawija; Paletówki projektu bez poziomego przewijania strony (min-width:0 kart, kolumny tabeli na tablecie), nadawca/odbiorca jedna kolumna na telefonie, pozycje palety jako zwarta siatka; lista zleceń i lista paletówek w 2 kolumnach kart na tablecie, numer zlecenia jako nagłówek karty; przycisk „Pobierz PDF zaznaczonych” na całą szerokość na telefonie.

== Zapotrzebowanie i zamówienia do dostawców (1.93.0) ==
- Tabele {prefix}msm_dost (dostawcy), msm_zap (zapotrzebowanie pozycji zleceń), msm_zam + msm_zam_poz (zamówienia), msm_zam_pz (dostawy PZ zaliczone na zamówienia). DB 49.
- Zapotrzebowanie (POST /zap): rezerwuje wolny materiał pasujący do specyfikacji (MSM_Rezerwacje::create z flagą cicho), reszta = brak w „Do zamówienia” (GET /zam/braki, grupowanie po materiale; blachy po grubości i gatunku stali).
- Zamówienia: POST /zam (z braków: zap ids, z „poniżej minimum”: item_id; do_szkicu = dopisanie), POST /zam/{id} (szkic: pozycje), /status (wyslane, szkic, zamkniete, anulowane), /wyslij (MSM_Mail szablon zam_dostawca + PDF w załączniku, Reply-To/Cc), GET /zam/{id}/pdf.
- PDF bez bibliotek: MSM_Pdf (Helvetica + Windows-1250, logo JPEG przez GD).
- PZ: POST /zam/dopasuj podpowiada otwarte pozycje zamówień (ten sam dostawca najpierw); MSM_PZ::create przyjmuje zam:[{line, poz, ilosc}] → MSM_Zam::pz_receive (przyjęto + rezerwacje dla zleceń); anulowanie PZ → MSM_Zam::pz_cancel.
- Uprawnienia: menu „zam_dost” (Dokumenty → Zamówienia), akcja „zamowienia”. Test przepływu: tests/zam-flow.php (SQLite).
- 1.93.1: Karta zlecenia – tabele z data-label i wartością w jednym bloku (.msm-zt__v), zawijanie długich nazw na telefonie, uwagi przesyłek bez podwójnych nawiasów.
- 1.93.2: Karta zlecenia – zamiast „Materiały”, „Pobrali / dla” i sum kg/mb/szt: dane zlecenia z Produkcji (GET /zlecenie/{nr} → projekt: klient, nr_zlec_klienta, start, koniec, nazwa projektu, link).
- 1.93.3: Pulpit – kliknięcie kafelka ustawia filtr listy (sessionStorage: msm_pg_flt + msm_pg_rok, msm_el_flt, msm_pm_flt, msm_prz_flt); tablica produkcji zwraca lata[stan][rok].
- 1.93.4: Historia wersji – data z godziną: zainstalowania (rejestr instalacji) albo wydania (data: RRRR-MM-DD GG:MM, dopisywana przez tools/build-zip.sh).
- 1.93.5: Przesyłki – karty na telefonie/tablecie: zawartość pod etykietą na całą szerokość, pozycja = opis + ilość, zlecenie pod spodem; uszkodzone z paskiem na karcie; puste uwagi ukryte.
- 1.93.6: Podgląd załączników w aplikacji (openViewer, linki a[data-view]): zdjęcie na pełnym ekranie, zamykanie ✕ / Esc / przycisk Wstecz (history.pushState), PDF – pobranie bez opuszczania aplikacji. PZ – etykiety pozycji na telefonie.
- 1.94.0: Przegląd spójności: prośby pracowników z zapotrzebowania czekają na akceptację admina (bez znikania braków); usuwanie zapotrzebowania z opcją zwolnienia rezerwacji; numer ZAM MM/RRRR po miesiącu; progi ostrzeżeń (zlecenia/elektro/pomiar) w Ustawieniach; uprawnienia sprawdzane na serwerze dla zleceń i „Do zamówienia”; licznik Zamówień liczy braki dla zleceń; PDF zamówienia w podglądzie aplikacji; WZ na telefonie z etykietami pól; jednolite „szt.”; e-maile rezerwacji i WZ jako szablony z logo.
- 1.94.1: Historia wersji – naprawiony błąd „(e.groups || []).map is not a function” (zły format wpisu 1.94.0); widok odporny na oba formaty, test formatu przy pakowaniu.
- 1.95.0: Lokalizacja (Ligota Wołczyńska / Wrocław) w przyrządach pomiarowych i elektronarzędziach: pole w karcie i formularzu, kolumna i filtr na listach, eksport Excel, Pulpit; lista lokalizacji w Ustawieniach; istniejące: P/Wr → Wrocław, reszta Ligota Wołczyńska (DB 51).
- 1.96.0: Nowa nazwa: System K-ERP (nazwa wtyczki, tytuł karty, role „K-ERP – administrator/przeglądający”, e-maile z przedrostkiem „[K-ERP]”, Historia wersji). Folder wtyczki, klucze ról i uprawnienia bez zmian. Strona logowania: funkcje systemu w skrócie (Magazyn, Dokumenty, Zakupy, Produkcja, Narzędziownia, BHP).
- 1.96.1: Aplikacja na telefonie (PWA) zostaje pod nazwą „Magazyn”.
- 1.97.0: Notatki zleceń jako zadania (Wykonano/Przywróć, wykonane niżej wyszarzone, licznik tylko otwartych; DB 53). Karta zlecenia – wydruk PDF. „Do zamówienia” – braki podświetlone jak przyrządy po terminie (komputer, tablet, telefon). Wydruk odrzuconego/anulowanego wniosku: „Odrzucił”, „Nie wydano”, powód odrzucenia. Karta zlecenia: rezerwacje – kolumna „Rozpatrzył”.
- 1.98.0: OCR WZ/PZ z wielu programów (Subiekt GT/nexo, Optima/XL, WF-Mag, Symfonia, enova365, Streamsoft, iFirma, Firmao, wFirma, Fakturownia, inFakt, Saldeo): odczyt tabeli po kolumnach z położenia tekstu (PDF i skan/zdjęcie), numer/data/dostawca/NIP z nagłówka, ciąg tabeli na kolejnych stronach, prostowanie zdjęć. Ustawienia: NIP firmy. Zaplecze zapamiętanych układów dostawców (REST /ocr-wzory) – okno nauki w kolejnej wersji.
- 1.99.0: Produkcja → Karty zmian: formularz karty zmiany (zmiana, obsada, stanowisko, do 10 programów), zapis w systemie, eksport do arkusza Excela 1:1 z wzorem firmy (data/karta-zmiany.xlsx; plik RRRR.MM.DD_Lx_zmN.xlsx). Dostęp włączany osobno (Użytkownicy → Produkcja → Karty zmian), domyślnie wyłączony; super administrator zawsze. Ustawienia: lista pracowników do kart zmian. DB 54.
- 1.99.1: Karty zmian – naprawiony błąd 500 przy eksporcie do Excela (brak wczytanej funkcji wp_tempnam w zapytaniu REST); czytelne komunikaty zamiast pustego błędu serwera.
- 1.99.2: Karty zmian – kopiowanie karty (wybór programów, czyszczenie wyników zmiany i uwag; data i godzina na teraz).
- 2.0.0: Karty zmian – nowy wygląd karty (jak karty przyrządów/elektronarzędzi: jedna karta formularza z sekcjami, listy wyboru, podsumowanie detali dobrych w nagłówku, programy jako panele z kolorem z arkusza). Numer zlecenia z nazwy programu (B02516_…); w zleceniu Produkcji zakładka „Karty zmian” (data, linia/zmiana, programy, detale dobre, kto wypełnił, link). DB 55.
- 2.1.0: Karty zmian – import z Excela (wiele plików naraz, układ wzoru/eksportu; linia, data i zmiana z nazwy pliku RRRR.MM.DD_Lx_zmN; podgląd, wybór linii, wykrywanie duplikatów; zapis przez tę samą walidację co formularz).
- 2.1.1: Zlecenie produkcyjne – licznik kart zmian na zakładce „Karty zmian”.
- 2.1.2: Karta zmiany otwarta z zakładki zlecenia – podsumowanie detali tylko dla programów tego zlecenia, pozostałe programy przygaszone, powrót do zlecenia.
- 2.1.3: Lista kart zmian – wynik (detale dobre, złe) każdego programu w osobnej linii z numerem zlecenia; suma tylko jako „Razem”.
- 2.2.0: Pulpit – moduł „Ostatnio dodane karty zmian” (numer zlecenia, detale dobre, data karty).
- 2.3.0: Pulpit – każdy moduł ma własną szerokość (1/6, 1/4, 1/3, 1/2, 2/3, 3/4, cała szerokość) w siatce 12 kolumn; zastępuje proporcje kolumn. Dotychczasowe układy przeliczane automatycznie.
- 2.3.1: Lista kart zmian – bez wiersza „Razem”; każdy program z własnymi detalami dobrymi i złymi.
- 2.4.0: Zlecenie → Karty zmian – podsumowanie w kafelkach: wyróżnione „Detale dobre razem” (z % zamówienia i pozostało), Złe, Karty zmian, Ostatnia.
- 2.5.0: Zlecenie produkcyjne – zakładka „Pobrania” (materiał pobrany do zlecenia, sumy kg/mb/szt., licznik na zakładce, przejście do Karty zlecenia).
- 2.6.0: Edycja PZ – nagłówek, ilości wierszy (korekta stanu o różnicę), usuwanie i dodawanie wierszy, skany; kontrola stanu i zamówień, wpis w historii.
- 2.7.0: Menu „Techniczne” w grupach z ikonami i opisami + link do Grafiku pracy (/grafik/); eksport do Excela i CSV jako ikony plików XLS / CSV.
- 2.7.1: Wydruk rejestru przesyłek – strony układane wg rzeczywistej wysokości wierszy (wcześniej część przesyłek była ucinana na dole strony).
- 2.7.2: Import z Excela przeniesiony z menu Techniczne do strony „Kopia danych”.
- 2.8.0: Nagłówek systemu (logo, menu, użytkownik) na stronie Grafiku pracy – MSM_Front::shell_enqueue() / shell_html() dla innych wtyczek.
- 2.8.1: Historia wersji – kafelek z wersją wtyczki Magazyn grafik.
- 2.8.2: Historia wersji – stronicowanie (10 / 20 / 50 / wszystkie na stronie).
- 2.9.0: Ustawienia w nowym układzie – menu sekcji, karty sekcji, listy osób i lokalizacji dodawane pojedynczo, pasek zapisu.
- 2.9.1: Przycisk „Grafik pracy” w nagłówku obok profilu (dla osób z uprawnieniem do grafiku).
- 2.10.0: Aplikacja na telefon – skróty ikony: Przyjmij PZ, Nowa przesyłka, Wnioski, Stal (z ikonami, wg uprawnień).
- 2.11.0: Zlecenie – nowy wygląd Notatek (kafelki + lista zadań z polem do zaznaczania), licznik paletówek na zakładce „Paletówki projektu”.
- 2.11.1: Logo bez podpisu „Magazyn stali, blach, kręgów” – sam znak i KISIELEWSKI na środku koła.
- 2.11.2: Poprawki bezpieczeństwa – uprawnienia sekcji także przy zapisie przez API i na wydrukach, limit rozmiaru importowanych arkuszy, testy bezpieczeństwa.
