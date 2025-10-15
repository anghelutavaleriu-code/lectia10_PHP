# LECTIA10_PHP – Stil Procedural cu MySQLi

## 🎯 Scopul proiectului

Acest proiect demonstrează utilizarea stilului procedural în PHP pentru conectarea la o bază de date MySQL și realizarea operațiilor CRUD (Create, Read, Update, Delete) folosind `mysqli`.

---

## 📁 Structura fișierelor

- `config.php` – conține datele de conectare la baza de date.
- `connection_procedural.php` – stabilește conexiunea cu baza de date folosind `mysqli_connect()` și setează charset-ul `utf8mb4`.
- `select_users.php` – selectează utilizatori din baza de date folosind prepared statements.
- `insert_user.php` – inserează un utilizator nou și tratează erorile de tip email duplicat.
- `form_insert_user.html` – formular HTML pentru adăugarea utilizatorilor.

---

## 🛠️ Tehnologii folosite

- PHP (stil procedural)
- MySQL
- XAMPP (server local)
- HTML + CSS

---

## 🔐 Securitate: SQL Injection

Toate interogările sunt realizate cu **prepared statements**, ceea ce blochează atacurile de tip SQL injection. Exemplu de atac simulat:

```sql
' OR '1'='1
