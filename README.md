# 🚀 Guías de Prácticas Laravel - TaskBoard: Pasarela de Pagos

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Git](https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white)
![GitHub](https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white)

---

<p align="center">
  <img src="https://res.cloudinary.com/bcwlyire/image/upload/v1785118882/NUEVO-LOGO-UPED-A-COLOR-scaled_szoqws.jpg" alt="Logo UPED" width="300"/>
</p>

## 🏛️ Información Académica

- **Institución:** Universidad Pedagógica de El Salvador *Luis Alonso Aparicio*
- **Facultad:** Ingeniería
- **Asignatura:** Integración de Sistemas
- **Ciclo:** 02-2026
- **Docente:** Ing. Oscar Contreras
- **Proyecto Integrador:** TaskBoard - Pasarela de Pagos

---

## 📌 Descripción del Proyecto

Este repositorio contiene el trabajo de la **Semana 11** del proyecto **TaskBoard**, una plataforma de **Pasarela de Pagos** desarrollada en el framework **Laravel 11**.

Hasta la Semana 10 el sistema solo sabía **crear** y **leer** transacciones. En esta semana se cierra el **CRUD completo** y se agrega el flujo de estados, a través de dos guías de laboratorio:

1. **Guía N.° 8 (jueves) — Actualizar y eliminar con Eloquent:** rutas **PUT** y **DELETE** con verbos simulados (`@method`), formulario de edición **pre-llenado** con `old('campo', $modelo->campo)`, eliminación protegida con `confirm()`, y un experimento real de **integridad referencial** (romper la eliminación con una clave foránea y repararla con `onDelete('cascade')`).
2. **Guía N.° 9 (viernes) — Mover estado de una transacción:** el método `moverEstado()` con ruta **PATCH** para cambiar el estado en un clic, sin abrir el formulario completo, más un **mapa de transiciones válidas** que bloquea los cambios sin sentido de negocio (una transacción Completada no se revierte).

Al terminar, una transacción se puede crear, consultar, corregir, eliminar y mover de estado desde el panel del comercio.

---

## 📁 Estructura del Proyecto

A continuación se detalla la estructura principal del repositorio y del proyecto Laravel `taskboard`:

```text
taskboard/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── ComercioController.php                # Listado con buscador y filtro por rubro
│   │   │   └── TransaccionController.php             # CRUD completo + moverEstado()
│   │   └── Requests/
│   │       └── GuardarTransaccionRequest.php         # Reutilizado en store() y en update()
│   └── Models/
│       ├── Comercio.php                              # hasMany(Transaccion)
│       ├── Transaccion.php                           # update() y delete() vienen de Eloquent
│       └── EventoTransaccion.php                     # belongsTo(Transaccion)
├── config/                                           # Archivos de configuración general del sistema
├── database/
│   ├── migrations/
│   │   ├── create_comercios_table.php                # Comercios afiliados a la pasarela
│   │   ├── create_transacciones_table.php            # Monto, cliente y estado de cada transacción
│   │   └── create_eventos_transaccion_table.php      # Clave foránea con onDelete('cascade')
│   └── seeders/
│       └── ComercioSeeder.php                        # Datos de ejemplo usados en todas las guías
├── public/                                           # Punto de entrada de la aplicación (index.php) y assets
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php                         # Layout maestro, mensaje flash y botones de acción
│       ├── components/                               # badge-estado, badge-actividad, resumen-actividad
│       ├── comercios/
│       │   ├── index.blade.php                       # Listado con buscador GET y filtro por rubro
│       │   └── show.blade.php                        # Editar, Eliminar y botones de estado por fila
│       ├── transacciones/
│       │   ├── create.blade.php                      # Formulario de nueva transacción
│       │   └── edit.blade.php                        # Formulario pre-llenado con @method('PUT')
│       └── practica/
│           └── formulario_demo.blade.php             # Sandbox de formularios (no toca la base)
├── routes/
│   └── web.php                                       # 5 rutas del CRUD + la ruta PATCH de mover estado
├── storage/                                          # Registros (logs), archivos cargados y caché de la app
├── vendor/                                           # Dependencias de PHP administradas por Composer
├── .env.example                                      # Variables de entorno de ejemplo
├── composer.json                                     # Configuración de Composer y paquetes
└── README.md                                         # Documentación principal del repositorio
```
