<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blazeclan - Transformación en la Nube</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }
    body {
      line-height: 1.6;
      background-color: #ffffff;
    }
    header {
      background: #ffffff;
      padding: 20px;
      position: sticky;
      top: 0;
      z-index: 100;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    nav {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .menu {
      list-style: none;
      display: flex;
      justify-content: center;
      gap: 40px;
      margin-top: 10px;
      position: relative;
    }
    .menu > li {
      position: relative;
    }
    .menu > li > a {
      text-decoration: none;
      color: #0a2540;
      font-weight: 600;
      padding: 10px;
      display: block;
      transition: all 0.3s;
    }
    .menu > li > a:hover,
    .menu > li > a.active {
      color: #00c2ff;
      border-bottom: 2px solid #00c2ff;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      top: 100%;
      background-color: white;
      box-shadow: 0px 8px 16px rgba(0,0,0,0.1);
      min-width: 200px;
      z-index: 99;
      border-radius: 6px;
      padding: 10px 0;
    }
    .dropdown-content li a {
      padding: 10px 20px;
      display: block;
      color: #0a2540;
      text-decoration: none;
    }
    .dropdown-content li a:hover {
      background-color: #f5f5f5;
      color: #00c2ff;
    }
    .dropdown:hover .dropdown-content {
      display: block;
    }
    @media (max-width: 768px) {
      .menu {
        flex-direction: column;
        gap: 10px;
        align-items: center;
      }
      .dropdown-content {
        position: static;
        box-shadow: none;
      }
    }
    nav h1 {
      font-size: 26px;
      font-weight: 800;
      color: #0a2540;
    }
    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
    }
    nav ul li a {
      color: #0a2540;
      text-decoration: none;
      font-weight: 600;
      padding-bottom: 4px;
      transition: all 0.3s;
    }
    nav ul li a:hover,
    nav ul li a.active {
      color: #00c2ff;
      border-bottom: 2px solid #00c2ff;
    }
    .hero {
      background: url('https://blazeclan.com/wp-content/uploads/2025/05/Blazec-scaled.jpg') center/cover no-repeat;
      color: white;
      text-align: center;
      height: 80vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      position: relative;
    }
    .hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1;
    }
    .hero h1,
    .hero p,
    .hero .cta {
      position: relative;
      z-index: 2;
    }
    .hero h1 {
      font-size: 48px;
      margin-bottom: 10px;
    }
    .hero p {
      font-size: 20px;
    }
    .cta {
      margin-top: 20px;
      display: inline-block;
      background-color: #00d812;
      color: white;
      padding: 12px 25px;
      text-decoration: none;
      font-weight: bold;
      border-radius: 8px;
      transition: background 0.3s ease;
    }
    .cta:hover {
      background-color: #008ab3;
    }
    section {
      padding: 80px 20px;
      max-width: 1000px;
      margin: auto;
      opacity: 0;
      transform: translateY(40px);
      transition: all 0.6s ease-in-out;
    }
    section.visible {
      opacity: 1;
      transform: translateY(0);
    }
    section h2 {
      color: #0a2540;
      margin-bottom: 20px;
      font-size: 28px;
    }
    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin-top: 20px;
    }
    .card {
      background: #f8f9fa;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      transition: transform 0.3s;
      border-radius: 8px;
      margin-bottom: 10px;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .card iframe {
      border-radius: 8px;
      margin-bottom: 10px;
    }
    footer {
      background: #0a2540;
      color: white;
      text-align: center;
      padding: 30px 0;
      margin-top: 50px;
    }
    @media (max-width: 768px) {
      nav ul {
        flex-direction: column;
        gap: 10px;
      }
      .hero h1 {
        font-size: 32px;
      }
    }
    .contacto-link {
      color: #000000 !important;
      font-weight: 800 !important;
      border-bottom: none !important;
    }
    .btn-inscribirse {
      background-color: #015a96;
      color: white;
      font-weight: bold;
      padding: 12px 20px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .btn-certificado {
      background-color: #00ad2b;
      color: white;
      font-weight: bold;
      padding: 9px 20px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
  </style>
</head>
<body>
  <header>

    <nav>
      <h1>Blazeclan</h1>
      <ul class="menu" style="flex: 1;">

        <li class="dropdown">
          <a href="#servicios">¿Qué servicios ofrecen?</a>
          <ul class="dropdown-content">
            <li><a href="#servicios">Consultoría sobre la nube</a></li>
            <li><a href="#servicios">Seguridad como servicio</a></li>
            <li><a href="#servicios">Servicios en la nube</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#cursos">Cursos Introductorios</a>
          <ul class="dropdown-content">
            <li><a href="#cursos">¿Qué es IaaS?</a></li>
            <li><a href="#cursos">¿Qué es PaaS?</a></li>
            <li><a href="#cursos">¿Qué es SaaS?</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#casos">Casos de Éxito</a>
          <ul class="dropdown-content">
            <li><a href="#casos">Reducción del tiempo de respuesta.</a></li>
            <li><a href="#casos">Migración de Java 8 a Java 17.</a></li>
            <li><a href="#casos">Mejorar la seguridad de una empresa de transporte de helicopteros.</a></li>
            <li><a href="#casos">Modernización de la arquitectura de datos de una empresa de restaurantes.</a></li>
            <li><a href="#casos">Automatización de detección de vulnerabilidades.</a></li>
          </ul>
        </li>
        <li>
          <a href="{{ url('/contacto') }}" target="_blank" class="contacto-boton">Contacto de Blazeclan</a>
        </li>
      </ul>
      <a href="{{ url('/login') }}" class="btn-login" style="margin-left:auto; margin-right:24px; background:#015a96; color:white; font-weight:600; padding:8px 20px; border-radius:8px; text-decoration:none; transition:background 0.2s;">Iniciar sesión</a>
    </nav>
  </header>
  <section class="hero" id="inicio">
    <h1>¿Qué es Blazeclan?</h1>
    <p>Expertos en migración y modernización en la nube</p>
    <a href="{{ url('/simulador') }}" target="_blank" class="cta" style="margin-top: 30px;">Simular Costo en la Nube</a>
  </section>
  <section id="servicios">
    <h2>Catálogo de Servicios</h2>
    <div class="cards">
      <div class="card">
        <h3>Consultoría y asesoramiento</h3>
        <p>Definir un plan de migración de nubes clara y concisa y una hoja de ruta. Utilizan herramientas de escaneo establecidas y realizan entrevistas con las partes interesadas para comprender la infraestructura y las aplicaciones existentes.</p>
      </div>
      <div class="card">
        <h3>Seguridad como servicio</h3>
        <p>Blazeclan ofrece servicios de seguridad integrados en una infraestructura existente para reducir el gasto de capital con propiedad y mantenimiento de la plataforma de seguridad.</p>
      </div>
      <div class="card">
        <h3>Servicios en la nube</h3>
        <p>Blazeclan aparte del asesoramiento, ofrece ciertos servicios como la vigilancia de los servidores, un servicio de soporte técnico para cualquier problema, la gestión de problemas en caso de que se presenten.</p>
      </div>
    </div>
  </section>
  <section id="cursos">
    <h2>Cursos introductorios</h2>
    <div class="cards">
      <div class="card">
        <iframe width="100%" height="180" src="https://www.youtube-nocookie.com/embed/UoOmvurFNBw" title="Curso IaaS" frameborder="0" allowfullscreen></iframe>
        <h3>IaaS (Infraestructura como Servicio)</h3>
        <p>Explora cómo las empresas migran sus recursos físicos a soluciones virtuales escalables.</p>
        <br>
        <button class="btn-inscribirse" data-curso="IAAS">Inscribirme</button>
        <p><br></p>
        <button class="btn-certificado" data-curso="IAAS" style="display: none;">Generar certificado</button>
      </div>
      <div class="card">
        <iframe width="100%" height="180" src="https://www.youtube-nocookie.com/embed/fMC9CJlkv_U" title="Curso PaaS" frameborder="0" allowfullscreen></iframe>
        <h3>PaaS (Plataforma como Servicio)</h3>
        <p>Conoce cómo funciona el modelo de software entregado vía internet, sin instalación local.</p>
        <br>
        <button class="btn-inscribirse" data-curso="PAAS">Inscribirme</button>
        <p><br></p>
        <button class="btn-certificado" data-curso="PAAS" style="display: none;">Generar certificado</button>
      </div>
      <div class="card">
        <iframe width="100%" height="180" src="https://www.youtube-nocookie.com/embed/7zIQdji-w24" title="¿Qué es SaaS?" frameborder="0" allowfullscreen></iframe>
        <h3>SaaS (Software como Servicio)</h3>
        <p>Entiende cómo el modelo SaaS revoluciona el acceso a herramientas empresariales.</p>
        <br>
        <button class="btn-inscribirse" data-curso="SAAS">Inscribirme</button>
        <p><br></p>
        <button class="btn-certificado" data-curso="SAAS" style="display: none;">Generar certificado</button>
      </div>
    </div>
  </section>
  <section id="casos">
    <h2>Casos de Éxito</h2>
    <h3>Reducción del tiempo de respuesta</h3>
    <p>Fundada en Asia en 2013, esta compañía líder en seguros de vida ha surgido como pionera en la industria, comprometida a mejorar las experiencias de los clientes a través de soluciones innovadoras impulsadas por la tecnología.</p>
    <br>
    <p>La empresa se enfrentaba a una importante fragmentación de datos en más de 50 sistemas fuente. Esta falta de integración dificultaba la toma de decisiones, reducía la eficiencia operativa y limitaba las oportunidades de monetización de datos. Para impulsar la innovación y mejorar la agilidad, la empresa necesitaba una solución de datos unificada.</p> <br>
    <p>Blazeclan implementó una solución poderosa y escalable para abordar los retos de datos y los objetivos estratégicos de la empresa: se implementaron 29 casos de uso de inteligencia artificial y análisis avanzados para obtener un valor de los datos empresariales, Se creó un centro centralizado que ofrece información real en todos los puntos de contacto. La UDH mejoró la toma de decisiones y monet datos antes de desaprobardos.</p>
    <br><br>
    <h3>Migración de Java 8 a Java 17</h3>
    <p>Cloudlytics es una plataforma de gestión de posturas de seguridad en la nube (CSPM) que ayuda a las organizaciones a mejorar su seguridad a través de entornos multinútreos. Al proporcionar configuraciones de seguridad automatizadas, monitoreo de actividad y controles de cumplimiento, Cloudlytics faculta a las empresas para detectar riesgos, gestionar amenazas y automatizar el cumplimiento de diversas normas regulatorias.​</p>
    <br>
    <p>Para mantener su ventaja competitiva, Cloudlytics buscó modernizar su infraestructura de backend transformando sus cargas de trabajo de Java 8 a Java 17 para mejorar el rendimiento, garantizar la seguridad</p>
    <br>
    <p>Cloudlytics se asoció con Blazeclan para apoyar el proyecto de transformación de la carga de trabajo. Blazeclan aportó una profunda experiencia técnica y un historial probado de ayudar a las empresas a modernizar su infraestructura de TI de manera eficiente y Blazeclan apalancó Amazon Q, un asistente de automatización impulsado por IA diseñado para acelerar las transformaciones de carga de trabajo a gran escala. Proporcionó funcionalidades clave que hicieron que el proceso de transformación fuera más rápido y eficiente</p>
    <br><br>
    <h3>Mejorar la seguridad de una empresa de transporte de helicopteros</h3>
    <p>El cliente es un envío global de helicópteros, que ofrece soluciones logísticas personalizadas para despliegues militares, proyectos en alta mar, operaciones de búsqueda y rescate y servicios médicos de emergencia. Con experiencia en transporte marítimo y aéreo chárter, garantizan la entrega segura y oportuna de carga de cualquier origen a cualquier destino. Su Centro Global de Atención al Cliente 24/7 ofrece a los clientes asistencia las 24 horas del día, reforzando su compromiso con la fiabilidad y la satisfacción de los clientes en cada envío.</p>
    <br>
    <p>Blazeclan Technologies mejoró la seguridad y la eficiencia en función de los costos de una compañía global de transporte de helicópteros. Implementaron AWS Cognito for Single Sign-On, migrado bases de datos a Amazon RDS PostgreSQL y infraestructura optimizada a través de una Revisión bien Archiitectada. Aprovechando los servicios de AWS como Secrets Manager y ALB, mejoraron la seguridad, racionalizaron el acceso y redujeron los costos, asegurando operaciones de envío confiables mientras mantenían el cumplimiento y las mejores prácticas.
    </p>
    <br><br>
    <h3>Modernización de la arquitectura de datos de una empresa de restaurantes</h3>
    <p>El cliente es una compañía de restaurantes global de rápido crecimiento que opera en 32 países con más de 9.500 tiendas. Con la misión de ofrecer comida excepcional y una experiencia de alimentación alegre, manejan 19 marcas de restaurantes diferentes. La compañía se dedica a mantenerse al frente en una industria competitiva abrazando la innovación y mejorando la eficiencia operativa en sus lugares de todo el mundo.</p>
    <br>
    <p>El cliente se enfrentó a varios desafíos con sus sistemas heredados obsoletos, que estaban obstaculizando la agilidad y ralentizando la innovación.</p>
    <br>
    <p>Blazeclan llevó a cabo una evaluación detallada del entorno existente del cliente y propuso un concepto de Data Lake para abordar las necesidades de datos actuales y futuras del Cliente. </p>
    <br><br>
    <h3>Automatización de detección de vulnerabilidades</h3>
    <p>Un líder de la industria en la NBFC enfocada en la educación quiso consolidar los incidentes de seguridad de sus múltiples cuentas en la Zona de AWS Landing junto con diferentes conjuntos de herramientas de seguridad. Planeando tener la automatización en su lugar para responder eficazmente a ciertos hallazgos de seguridad, el cliente quería tener controles de seguridad para reducir el tiempo que se tarda en el proceso de respuesta manual. También querían reforzar la postura general de seguridad de su entorno en la nube y mitigar los riesgos en la infraestructura.​</p>
    <br>
    <p>
    Con Blazeclan, la integración de los instrumentos de seguridad de próxima generación mejoró la mitigación del riesgo, redujo el tiempo de respuesta manual y fortaleció la postura de seguridad en la nube, garantizando la protección en tiempo real contra las amenazas cibernéticas.
    </p>
  </section>
  <footer>
    <p>&copy; 2025 Blazeclan. Todos los derechos reservados.</p>
  </footer>
  <script>
    // Scroll animation
    const sections = document.querySelectorAll("section");
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        }
      });
    }, {
      threshold: 0.1
    });
    sections.forEach(section => observer.observe(section));
    // Scroll spy
    const links = document.querySelectorAll("nav ul li a");
    window.addEventListener("scroll", () => {
      const fromTop = window.scrollY + 80;
      links.forEach(link => {
        const section = document.querySelector(link.getAttribute("href"));
        if (section.offsetTop <= fromTop && section.offsetTop + section.offsetHeight > fromTop) {
          links.forEach(l => l.classList.remove("active"));
          link.classList.add("active");
        }
      });
    });
  </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
<style>
  .btn-inscribirse-activo {
    background: #28a745 !important;
    color: #fff !important;
    border: 2px solid #218838 !important;
    font-weight: bold;
    transition: background 0.2s;
  }
</style>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-inscribirse').forEach(function(btn) {
      btn.addEventListener('click', function() {
        var curso = btn.getAttribute('data-curso');
        // Activa el botón actual (permite múltiples activos)
        btn.classList.add('btn-inscribirse-activo');
        // Muestra solo el botón de certificado correspondiente
        var certBtn = document.querySelector('.btn-certificado[data-curso="' + curso + '"]');
        if(certBtn) certBtn.style.display = 'inline-block';
      });
    });
    document.querySelectorAll('.btn-certificado').forEach(function(btn) {
      btn.addEventListener('click', function() {
        var curso = btn.getAttribute('data-curso');
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        doc.setFontSize(18);
        doc.text('Certificado de finalización', 20, 30);
        doc.setFontSize(14);
        doc.text('Otorgado por completar el curso:', 20, 50);
        doc.setFontSize(16);
        doc.text(curso, 20, 65);
        doc.setFontSize(12);
        doc.text('Fecha: ' + new Date().toLocaleDateString(), 20, 85);
        doc.save('certificado_' + curso + '.pdf');
      });
    });
  });
</script>
</html>