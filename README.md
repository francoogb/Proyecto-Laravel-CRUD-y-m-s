<h1 align="center">📦 Sistema CRUD con Laravel + MySQL</h1>

<p align="center">
  Aplicación web construida con <strong>Laravel</strong> y conectada a <strong>MySQL</strong>. Incluye CRUD de productos, generación de PDF, envío de correos, búsqueda, categorías y autenticación de usuarios.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/Blade-F7523F?style=flat-square&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/Bootstrap-7952B3?style=flat-square&logo=bootstrap&logoColor=white" />
</p>

---

## 📸 Captura

<!-- Reemplaza esta línea con una captura real del proyecto -->
<p align="center"><em>Agregar aquí captura del listado de productos / generación de PDF</em></p>

---

## ✨ Características

- 📝 **CRUD completo de productos** (crear, leer, actualizar, eliminar)
- 🗂️ **Categorización** de productos
- 🔍 **Búsqueda por nombre** de producto
- 📄 **Generación de PDF** con el listado de productos
- 📧 **Envío de correos electrónicos** desde la aplicación
- 👤 **Registro e inicio de sesión** de usuarios
- 🔒 **Rutas protegidas** solo accesibles para usuarios autenticados
- 💅 **Interfaz limpia** y responsive

---

## 🧱 Stack técnico

| Capa | Tecnología |
|------|------------|
| Framework | Laravel |
| Lenguaje | PHP |
| Base de datos | MySQL |
| Motor de plantillas | Blade |
| Frontend | HTML, CSS, Bootstrap |
| Generación PDF | DomPDF / Laravel-DomPDF |
| Correos | Mailable + Mail Facade de Laravel |

---

## 📋 Requisitos previos

Antes de empezar necesitas tener instalado:

- **PHP** 8.1 o superior
- **Composer** 2.x
- **MySQL** 5.7+ o MariaDB
- **Node.js** y **npm** (para los assets)

---

## 🚀 Instalación y uso

### 1. Clonar el repositorio

```bash
git clone https://github.com/francoogb/Proyecto-Laravel-CRUD-y-m-s.git
cd Proyecto-Laravel-CRUD-y-m-s
```

### 2. Instalar dependencias de PHP

```bash
composer install
```

### 3. Instalar dependencias de Node

```bash
npm install
npm run dev
```

### 4. Configurar variables de entorno

```bash
cp .env.example .env
php artisan key:generate
```

Edita el archivo `.env` con tus datos de MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tu_correo@gmail.com
MAIL_PASSWORD=tu_app_password
MAIL_ENCRYPTION=tls
```

### 5. Crear la base de datos y correr migraciones

```bash
php artisan migrate
```

### 6. (Opcional) Poblar la base de datos con datos de prueba

```bash
php artisan db:seed
```

### 7. Levantar el servidor

```bash
php artisan serve
```

Abre tu navegador en: **http://127.0.0.1:8000**

---

## 📂 Rutas principales

| Ruta | Método | Descripción |
|------|--------|-------------|
| `/` | GET | Página de inicio |
| `/login` | GET / POST | Inicio de sesión |
| `/register` | GET / POST | Registro de usuarios |
| `/productos` | GET | Listado de productos |
| `/productos/create` | GET / POST | Crear producto |
| `/productos/{id}/edit` | GET / PUT | Editar producto |
| `/productos/{id}` | DELETE | Eliminar producto |
| `/productos/pdf` | GET | Descargar PDF del listado |
| `/productos/buscar` | GET | Buscar producto por nombre |

---

## 🎯 Lo que aprendí construyendo este proyecto

- Arquitectura MVC con Laravel
- Autenticación con Laravel Breeze / sistema propio
- Generación de PDFs dinámicos desde datos de BD
- Envío de correos transaccionales con plantillas Blade
- Validación de formularios con Request Classes
- Relaciones entre modelos (productos ↔ categorías)
- Consultas con el ORM Eloquent

---

## 📬 Contacto

**Franco Ignacio** · Desarrollador Full Stack
📧 [fran.valdenegr@gmail.com](mailto:fran.valdenegr@gmail.com)
💼 [GitHub @francoogb](https://github.com/francoogb)
📍 Santiago de Chile

---

<p align="center">
  <em>Si te sirvió el proyecto, ⭐ dale una estrella en GitHub.</em>
</p>
