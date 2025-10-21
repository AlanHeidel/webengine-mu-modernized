# Liberty MU — Rediseño y Modernización de WebEngine CMS

## Descripción del Proyecto
Este proyecto es una **versión rediseñada y modernizada** de una página web gratuita y open source basada en **WebEngine CMS**, utilizada para servidores privados del juego **MU Online**.

El reto fue tomar una base heredada (un CMS antiguo, con estructura rígida y estilos desactualizados) y **renovar completamente su diseño visual y experiencia de usuario**, manteniendo la compatibilidad con el sistema original.

Además del rediseño, se integró una nueva funcionalidad de **noticias y avisos automáticos**, administrada mediante **Google Sheets API**, permitiendo que el administrador del sitio publique contenido dinámico sin editar archivos del servidor.

---

## Antes y Después

| Versión | Enlace |
|----------|--------|
| Versión Original (sin rediseño) | [Ver sitio antiguo](https://liberty-mu.com/) |
| Versión Modernizada (rediseño completo) | [Ver nuevo sitio](https://libertymu2.com/) |

---

## Características Principales

### Rediseño Moderno
- Interfaz completamente reconstruida con un enfoque minimalista y responsivo.  
- Colores, tipografía y estructura inspirados en interfaces de videojuegos actuales.  
- Secciones como noticias, cuenta, rankings y avisos fueron actualizadas visualmente.

### Integración con Google Sheets API
- Permite al administrador cargar noticias o avisos directamente desde una hoja de cálculo en Google Sheets.  
- El sitio consume la información desde una API PHP con autenticación de servicio (`credentials.json`).  
- Los datos se muestran automáticamente en la página sin necesidad de intervención manual.

### Compatibilidad con WebEngine CMS
- Se mantuvo el backend original, incluyendo conexión con base de datos MSSQL y cron jobs.  

### Backend y Compatibilidad
- Mantiene el funcionamiento original del **WebEngine CMS**.  
- Cron jobs y sistema de cache optimizado para estadísticas y rankings.

---

## Tecnologías Utilizadas

| Capa | Tecnologías |
|------|--------------|
| **Frontend** | HTML5, CSS3, JavaScript (ES6) |
| **Backend** | PHP 8.1 |
| **API** | Google Sheets API v4 |
| **CMS Base** | WebEngine CMS (Open Source) |
| **Servidor** | Apache / cPanel |
| **Automatización** | Cron Jobs |
---

## Reflexión del Proyecto

Este proyecto representa un caso real de modernización de software heredado.
El desafío principal fue actualizar una base existente sin romper su núcleo, aplicando buenas prácticas de desarrollo moderno y manteniendo la compatibilidad con la lógica original del CMS.

La integración con Google Sheets muestra la capacidad de extender sistemas antiguos con APIs modernas, logrando una administración más eficiente y sin intervención técnica.

---

## Licencia

Este proyecto se distribuye bajo la licencia MIT, manteniendo el crédito correspondiente al CMS original WebEngineCMS.
