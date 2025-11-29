<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$answers = [
  'menu' => [
    'keys'   => ['0','menu','menú','0️⃣','hola','buenas','buenos días','buenas tardes','buenas noches','hey','qué tal','información','info','quiero saber','me interesa','cuéntame','cómo funciona','qué hacen','qué ofrecen','precio','precios','cuánto cuesta','donde están','ubicación','cómo llego','dirección','horario','horarios','cita','agendar','reservar','quiero una cita','hablar con alguien','hablar con terapeuta','pablo','psicólogo'],
    'text'   => "¡Hola! Soy Pablo Niebla, psicoterapeuta 😊\nGracias por escribirme. ¿Qué necesitas saber?\n\n• *info* → servicios que ofrecemos\n• *horario* → días y horas\n• *precio* → costos\n• *ubicación* → dirección y mapa\n• *cita* → agendar sesión\n• *terapeuta* → hablar conmigo directo\n\nTambién puedes decirme *‘menú’* en cualquier momento para volver aquí."
  ],
  'info' => [
    'keys'   => ['info','información','qué terapias hacen','qué servicios tienen','tipos de terapia','opciones','modalidades','a','b','c','d'],
    'text'   => "Estas son nuestras terapias:\n\nA) Terapia individual adultos\nB) Terapia niños/adolescentes\nC) Terapia de pareja\nD) Terapia familiar\n\n¿Cuál te interesa? Solo escribe la letra o dime *‘más info’* si quieres detalles."
  ],
  'horario' => [
    'keys'   => ['horario','horarios','qué días atienden','cuándo puedo ir','hay citas los sábados','fin de semana','horas disponibles','qué horas manejan','hasta qué hora','a qué hora empiezan'],
    'text'   => "Horarios que manejamos:\n• Lunes a viernes: 11 AM – 7 PM\n• Sábados: 10 AM – 3 PM\n\nLas citas se confirman una vez llenes el formulario. ¿Te gustaría agendar ahora?"
  ],
  'precio' => [
    'keys'   => ['precio','precios','cuánto cuesta','cuánto vale','costo','tarifa','precio por sesión','es caro','hay promoción','barato','economico','precios 2024'],
    'text'   => "Costos por sesión:\n• Niños/adolescentes: $400\n• Adultos: $500\n• Pareja: $700\n• Familiar: $800\n\nAceptamos transferencia y efectivo. Si necesitas factura, avísame."
  ],
  'ubicacion' => [
    'keys'   => ['ubicacion','ubicación','dónde están','dirección','cómo llego','están lejos','mapa','google maps','calle','colonia','flores magón','clouthier','4727'],
    'text'   => "Nos encontramos en:\n📍 Av. Manuel J. Clouthier 4727, Col. Flores Magón, Culiacán.\nGoogle Maps: https://maps.app.goo.gl/JymtCS5M4tiKYB8y9\n\nPuedes venir presencial o por videollamada. Tú eliges."
  ],
  'cita' => [
    'keys'   => ['cita','agendar','reservar','quiero una cita','sacar hora','pedir hora','cómo me anoto','inscribirme','formulario','link para agendar'],
    'text'   => "Para agendar solo llena este formulario (toma 2 min):\n👉 https://whatsform.com/4VcUjg\n\nEn cuanto llegue tu información te confirmo día y hora. ¿Dudas? Escríbeme."
  ],
  'terapeuta' => [
    'keys'   => ['terapeuta','pablo','psicólogo','hablar con alguien','duda personal','quiero hablar','tengo una pregunta','llamada','teléfono','whatsapp directo'],
    'text'   => "Soy yo, Pablo. Si necesitas algo personalizado, escríbeme directo:\nhttps://wa.me/526694310539\n\nNormalmente respondo en cuanto veo el mensaje. Gracias por tu paciencia."
  ],
  'terapia_adulto' => [
    'keys'   => ['a','adulto','adultos','terapia individual','terapia para mi','para mí','yo','mi pareja no','solo yo'],
    'text'   => "Con gusto. Terapia individual para adultos:\n• Enfoque: cognitivo-conductual\n• Duración: 1 h\n• Precio: $500\n¿Te gustaría agendar? Solo dime *‘cita’* y lo coordinamos."
  ],
  'terapia_infantil' => [
    'keys'   => ['b','niño','niña','adolescente','hijo','hija','colegio','bullying','autoestima','depresión adolescente','terapia infantil'],
    'text'   => "Trabajamos con niños y adolescentes:\n• Duración: 1 h\n• Precio: $400\nLa terapeuta es Paulina Gámez. Puedes hablar con ella:\nhttps://wa.me/526691135992\n¿Alguna pregunta antes?"
  ],
  'terapia_pareja' => [
    'keys'   => ['c','pareja','novio','novia','esposo','esposa','relación','celos','infidelidad','comunicación','divorcio','crisis','terapia de pareja'],
    'text'   => "Terapia de pareja:\n• Duración: 1 h 15-30 min\n• Precio: $700\n• Temas: comunicación, celos, infidelidad, decisiones, etc.\n¿Te gustaría reservar? Escríbeme *‘cita’* y lo agendamos."
  ],
  'terapia_familiar' => [
    'keys'   => ['d','familia','familiares','hijos','hermanos','papá','mamá','padres','hijo adolescente','conflicto familiar','terapia familiar'],
    'text'   => "Próximamente ampliaremos info de terapia familiar. Mientras tanto, ¿te gustaría hablar conmigo directo? Solo escribe *‘terapeuta’* y coordinamos."
  ]
];

// Lee mensaje del usuario
// WhatsApp Auto envía form-data, no JSON
$msg    = strtolower(trim($_POST['message'] ?? ''));
$sender = $_POST['sender'] ?? '';
$reply  = "No capté eso. ¿Podrías escribir *menú* para que te ayude?";


foreach ($answers as $a) {
  if (in_array($msg, array_map('strtolower', $a['keys']))) {
    $reply = $a['text'];
    break;
  }
}

// AutoResponder FREE espera JSON puro
header('Content-Type: application/json');
echo json_encode(['reply' => $reply], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
exit;
JSON_UNESCAPED_UNICODE);
