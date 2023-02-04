# Dogtor

Ciascun animale può essere paziente o soggetto. Di ciascun animale: nome, dataNascita, luogoNascita, luogoResidenza e una persona proprietaria, identificatore univoco, specie, razza. Ogni animale può avere più accompagnatari.

Di ogni persona si vuole registrare nome, cognome, codice fiscale, uno o più numeri di telefono (di cui uno principale).

C'è la possibilità di registrare non solo cani (specie e razza diverse). Operazioni sui cani più agevolate rispetto alle altre specie.

Prenotazione raggiungibile dalla pagina principale. Per la prenotazione: informazioni della persona accompagnatrice, informazioni dell' animale, un menu con i problemi piu comuni (indigestione, ferita, trauma...), una descrizione più dettagliata di esso e se urgente o meno.Dopo aver prenotato si vede l' elenco di disponibilità (limitato) in ordine cronologico per effettuare la visita.

Sistema di login per agevolare il riconoscimento dell' animale e della persona. Una persona può essere proprietaria e/o accompagnatrice di più animali, e ogni animale può avere più persone associate.

Gestione delle prenotazione eseguite manualmente da un addetto (admin?). Quando viene inoltrata una prenotazione, nel lasso di tempo in cui non è ancora confermata, viene identificata come non disponibile. L' addetto ha la possibilitò di visualizzare l' elenco di prenotazioni non confermate in ordine cronologico dalla più recente. Di ogni visita bisogna visualizzare le informazioni chiave. Nel caso in cui ci si clicca sopra, vengono visualizzate le informazioni più dettagliate. In tutti e due i casi ci dev' essere un bottone per poter confermare o annullare la prenotazione. Nel caso di annullamento si può inserire una nota (opzionale) che verrà inviata alla mail dell' utente. L' utente può vedere l' elenco delle prenotazioni annullate ed effettuate.
Quando una prenotazione viene confermata, viene spostata nella lista di visite non ancora effettuate. Le visite odierne sono visualizzate in alto con colorazione speciale mentre le altre in basso. Le visite nel futuro sono raggruppate per giorno e ordinate dal mattino (in alto) a sera (in basso). Ogni visita comprende una riga. Ci deve essere un riepilogo mensile in cui si vedono quante visite sono gia state prenotate e confermate per giorno.

Il medico può visualizzare le visite e ricercane tramite filtro per keyword. Cliccando su una visita vede tutti i dettagli e può aggiungere delle note: può scegliere la tipologia del problema tramite menu (stesso dell utente) che serve per confermare o cambiare il problema scelto dall utente, la motivazione scelta dall' utente non deve essere cancellata, può scrivere nel campo "diagnosi" i dettagli del problema, può scrivere nel campo "cura" cosa è stato fatto al paziente e cosa si prescrive.

La visita costa 35 euro di base (il medico può inserire un prezzo superiore) e dev' essere pagata al momento.

Quando il medico termina la visita, certifica che è stata pagata e che l' animale è stato dimesso con l' accompagnatore. La visita viene spostata nella lista delle visite fatte con lo stesso ordine più il costo.

L' utente può vedere, in diversi elenchi, le visite prenotate, confermate ed effettuate.
Viene inoltre visualizzato un riepilogo delle visite fatte nel mese con il prezzo totale.totale,

(un riepilogo mensile per
macro tipologia di problema (per questo si prendano le informazioni inserite dal medico)?? (un riepilogo
generale che mostra la quantità di visite che hanno subito una riclassificazione di tipologia, utile per capire
se gli utenti stanno usando correttamente il software.)??

# Progettazione concettuale

Entità:

animale/soggetto -> nome, dataNascita, luogoNascita, luogoResidenza, id, specie, razza;
accompagnatore/proprietario/utente -> nome, cognome, indirizzo, telefoni, codice fiscale;
medico -> username, password, nome, cognome;
admin
prenotazione -> animale, accompagnatore, motivazione, descrizione, data, ora;
visita effettuata -> diagnosi, cura, prezzo;

# Progettazione logic

tAnimale -> id (PRIMARY KEY), nome, dataNascita, luogoNascita, luogoResidenza, specie, razza;
tUtente -> id (PRIMARY KEY), nome, cognome, username, idIndirizzo(FOREIGN KEY), codiceFiscale, tipologia(admin, medico, accompagnatore, proprietario);
tIndirizzo -> id(PRIMARY KEY), CAP, via, numero civico;
tTelefono -> id(PRIMARY KEY), numero, idUtente(FOREIGN KEY);
tPrenotazione -> id(PRIMARY KEY), idAnimale(FOREIGN KEY), idAccompagnatore/proprietario(FOREIGN KEY), motivazione, descrizione, nota, data, ora, stato(confermata, da confermare o annullata), gravità(se urgente o meno);
tRisultato(risultato della visita) -> id(PRIMARY KEY), idPrenotazione(FOREIGN KEY), motivazione, diagnosi, cura, prezzo;
