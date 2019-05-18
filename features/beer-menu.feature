#language: pl
Funkcja:
  Jako klient chciałbym móc zobaczyć aktualne menu piwa
  Żeby nie chodzić bez sensu do baru

  Scenariusz: Nowe piwo w menu
    Gdy barman doda nowe piwa:
    | nazwa       | opis                                                                                                                                                                                                                                                                                                                                                                              |
    | California  | California, czyli AIPA w naszym wykonaniu, jest małym amerykańskim snem zamkniętym pod kapslem. To kaskada cytrusowych, kwiatowych aromatów z lekką nutą żywiczności i słodowości, która przeniesie Cię na zachodnie wybrzeże jednego z najpiękniejszych stanów USA. Chmielona amerykańskimi odmianami chmielu, gwarantuje wyraźną, dobrze zbalansowaną i niezalegającą goryczkę. |
    Wtedy klient powinien zobaczyć 1 piwo

  Scenariusz: Piwo dostępne w menu się skończyło
    Zakładając że barman dodał piwa:
    | nazwa        | opis                                                                                                                                                                                                                                                                                                                                                                              |
    | California   | California, czyli AIPA w naszym wykonaniu, jest małym amerykańskim snem zamkniętym pod kapslem. To kaskada cytrusowych, kwiatowych aromatów z lekką nutą żywiczności i słodowości, która przeniesie Cię na zachodnie wybrzeże jednego z najpiękniejszych stanów USA. Chmielona amerykańskimi odmianami chmielu, gwarantuje wyraźną, dobrze zbalansowaną i niezalegającą goryczkę. |
    | Harry        | Harry wyjechał na studia do USA. Jako anglik pijał herbatę earl grey, ale musiał się dostosować do amerykanów, którzy bardziej niż herbatę, lubią piwo. Specjalnie dla Harry`ego uwarzyliśmy lekkie, jasne piwo o niskiej goryczy i wyraźnym, ale nie dominującym charakterze herbaty earl-grey.|
    | Nonsens Pils | Klasyczny pils z małym twistem w postaci herbaty earl grey. Uwarzony dla Pubu Nonsens w Gdyni.                                                                                                                                                                                                  |
    Kiedy barman stwierdzi, że piwo "California" się skończyło
    Wtedy klient powinien zobaczyć 2 piwa
