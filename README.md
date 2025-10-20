# 🌐 Liberty MU — Rediseño y Modernización de WebEngine CMS

## 🧩 Descripción del Proyecto
Este proyecto es una **versión rediseñada y modernizada** de una página web gratuita y open source basada en **WebEngine CMS**, utilizada para servidores privados del juego **MU Online**.

El reto fue tomar una base heredada (un CMS antiguo, con estructura rígida y estilos desactualizados) y **renovar completamente su diseño visual y experiencia de usuario**, manteniendo la compatibilidad con el sistema original.

Además del rediseño, se integró una nueva funcionalidad de **noticias y avisos automáticos**, administrada mediante **Google Sheets API**, permitiendo que el administrador del sitio publique contenido dinámico sin editar archivos del servidor.

---

## 🚀 Características Principales

### 🎨 Rediseño Moderno
- Interfaz completamente reconstruida con un enfoque minimalista y responsivo.  
- Colores, tipografía y estructura inspirados en interfaces de videojuegos actuales.  
- Secciones como noticias, cuenta, rankings y avisos fueron actualizadas visualmente.

### ⚙️ Integración con Google Sheets API
- Permite al administrador cargar noticias o avisos directamente desde una hoja de cálculo en Google Sheets.  
- El sitio consume la información desde una API PHP con autenticación de servicio (`credentials.json`).  
- Los datos se muestran automáticamente en la página sin necesidad de intervención manual.

### 💾 Compatibilidad con WebEngine CMS
- Se mantuvo el backend original, incluyendo conexión con base de datos MSSQL y cron jobs.  
- Se mejoró la estructura de archivos y el rendimiento general en carga de secciones.

### 🔔 Sistema de Avisos Dinámico
- Se agregó un **panel lateral animado** para mostrar avisos del administrador.  
- Incluye efectos visuales (blur, transiciones, iconografía SVG).  
- Se puede desplegar y cerrar sin interrumpir la navegación del usuario.

---

## 🧠 Tecnologías Utilizadas
- **Frontend:** HTML5, CSS3, JavaScript (ES6)
- **Backend:** PHP 8.1 con PDO y soporte para dblib (MSSQL)
- **API:** Google Sheets API (v4)
- **CMS Base:** WebEngine CMS (Open Source)
- **Servidor:** Apache + XAMPP / CPanel (producción)
- **Integración externa:** Cron jobs automáticos

---