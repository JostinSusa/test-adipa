# 🧪 Prueba Técnica - Desarrollador Backend (Themosis)

Este proyecto es una prueba técnica para el cargo de Desarrollador Backend, construida sobre el framework **Themosis 3.1**. Implementa un sistema CRUD completo para gestionar personas, con validación de RUT chileno y acceso restringido a usuarios administradores de Wordpress.

---

## 🧰 Tecnologías utilizadas

- PHP 8.4
- WordPress (con estructura Themosis)
- Themosis Framework 3.1
- Laravel Mix
- Bootstrap 5
- MySQL

---

## 📦 Requisitos del sistema

- PHP >= 8.0
- Composer
- Node.js y npm
- Base de datos MySQL
- Entorno local con Laravel Valet, Homestead, LocalWP o similar

---

## ⚙️ Instalación

1. Clona el repositorio:

```bash
git clone https://github.com/JostinSusa/test-adipa.git
cd test-adipa
```
2. Instala dependencias PHP:

```bash
composer install
```

3. Copia y configura el archivo .env:

```bash
cp .env.example .env
# Edita las credenciales DB, URLs, etc.
php artisan key:generate
```

4. Instala dependencias JavaScript y compila assets:

```bash
npm install
npm run dev
```

5. Configura tu entorno web (opcional con Valet): 

```bash
valet link adipa
valet secure adipa
```

6. Crea la base de datos (en tu gestor o CLI) y corre las migraciones.

## 🚀 Acceso

Para acceder a la sección protegida del sistema, inicia sesión como administrador de WordPress.

