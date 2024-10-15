# SaveTheFood 🍎🥦

**SaveTheFood** è un'applicazione web nata per ridurre lo spreco alimentare, offrendo una seconda possibilità ai prodotti alimentari che non soddisfano i canoni estetici del mercato, ma che sono perfettamente commestibili. L'obiettivo è permettere ai consumatori di acquistare questi prodotti a prezzi scontati, contribuendo così alla lotta contro lo spreco alimentare e promuovendo un consumo più sostenibile.

Grazie a **SaveTheFood**, gli utenti possono esplorare un'ampia gamma di prodotti eco-friendly e fare la loro parte per salvare il cibo, il tutto con una piattaforma semplice, moderna e accessibile.

## Tecnologie utilizzate 💻

- **Laravel**: Backend PHP per la gestione del database e delle API.
- **Vue.js 3**: Framework JavaScript per un'interfaccia utente dinamica e reattiva.
- **Inertia.js**: Facilita la costruzione di Single Page Applications senza rinunciare alla semplicità di Laravel.
- **Tailwind CSS**: Framework CSS per uno stile moderno e personalizzabile.
- **PostgreSQL**: Database relazionale scelto per la sua robustezza e affidabilità.
- **Heroku**: Piattaforma cloud per il deploy dell'applicazione.

## Funzionalità principali 🌟

- **Autenticazione utenti**: Registrazione e login tramite Laravel Jetstream.
- **Sistema di rating**: Gli utenti possono assegnare un voto da 1 a 5 per promuovere i prodotti.
- **Visualizzazione dei voti**: Mostra il numero totale dei voti ricevuti dai prodotti, aggiornato in tempo reale.
- **Gestione dei prodotti**: Esplora e acquista prodotti eco-friendly con sconti basati sul loro stato estetico.
- **Design reattivo**: L'interfaccia è ottimizzata per dispositivi desktop e mobile, grazie a Tailwind CSS.
- **Deploy su Heroku**: Applicazione completamente integrata con PostgreSQL e deployata su Heroku per facilità di accesso.

## Installazione 🛠️

Segui i passaggi sottostanti per installare l'applicazione in locale.

### Requisiti di sistema

- **PHP >= 8.2**
- **Composer**
- **Node.js & npm**
- **PostgreSQL**

### Passaggi di installazione

1. **Clona il repository:**

    ```bash
    git clone https://github.com/iosonoclaudi1/SaveTheFood.git
    cd SaveTheFood
    ```

2. **Configura il file `.env`:**

    Copia il file di esempio `.env` e imposta le variabili d'ambiente, come chiavi API e configurazioni del database.

    ```bash
    cp .env.example .env
    ```

3. **Installa le dipendenze PHP e JavaScript:**

    ```bash
    composer install
    npm install
    ```

4. **Genera la chiave dell'applicazione:**

    ```bash
    php artisan key:generate
    ```

5. **Esegui le migrazioni del database:**

    ```bash
    php artisan migrate
    ```

6. **Compila gli asset per lo sviluppo:**

    ```bash
    npm run dev
    ```

    Per una build di produzione:

    ```bash
    npm run build
    ```

7. **Avvia il server locale:**

    ```bash
    php artisan serve
    ```

L'app sarà accessibile su `http://127.0.0.1:8000`.

## API 📡

SaveTheFood include alcune API per gestire i voti dei prodotti. Qui sotto ci sono due endpoint chiave.

### Ottenere il numero totale di voti

- **Endpoint**: `/api/ratings/total`
- **Metodo**: `GET`
- **Descrizione**: Restituisce il numero totale di voti dati ai prodotti.
- **Esempio**:
  - In locale: `http://127.0.0.1:8000/api/ratings/total`
  - In produzione (Heroku): [`https://savethefood-6221a38a6768.herokuapp.com/api/ratings/total`](https://savethefood-6221a38a6768.herokuapp.com/api/ratings/total)

### Aggiungere un voto

- **Endpoint**: `/api/ratings`
- **Metodo**: `POST`
- **Payload**:

    ```json
    {
      "rating": 5
    }
    ```

- **Descrizione**: Permette all'utente di aggiungere un voto da 1 a 5.

## Deploy su Heroku 🚀

Per effettuare il deploy su **Heroku**, segui questi passaggi:

1. **Login su Heroku**:

    ```bash
    heroku login
    ```

2. **Crea un'app su Heroku**:

    ```bash
    heroku create
    ```

3. **Aggiungi PostgreSQL al tuo progetto**:

    ```bash
    heroku addons:create heroku-postgresql:hobby-dev
    ```

4. **Imposta le variabili d'ambiente su Heroku**:

    ```bash
    heroku config:set APP_KEY=base64:<tua_chiave>
    ```

5. **Effettua il push del codice su Heroku**:

    ```bash
    git push heroku main
    ```

6. **Esegui le migrazioni del database su Heroku**:

    ```bash
    heroku run php artisan migrate --force
    ```

## Licenza 📄

Questo progetto è distribuito sotto la licenza MIT. Puoi leggere il file LICENSE per maggiori informazioni.

---

Creato con ❤️ da **Maldera Claudio**
