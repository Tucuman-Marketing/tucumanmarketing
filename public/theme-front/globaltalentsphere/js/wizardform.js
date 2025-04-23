function showStep(step, mode = "") {
  console.log(`Changing to step: ${step}, mode: ${mode}`); // Debugging output

  // Hide all steps
  const steps = document.querySelectorAll(".step");
  steps.forEach((stepElement) => {
    stepElement.classList.remove("active");
  });

  // Save the last mode if we're changing to step 2 and a mode is provided
  if (step === 2 && mode) {
    lastMode = mode;
  }

  // Determine which step to show
  if (step === 2 && !mode && lastMode) {
    // If returning to step 2 and no mode is specified, use the last stored mode
    document.getElementById(`step2-${lastMode}`).classList.add("active");
  } else if (step === 2 && mode) {
    // If a mode is specified for step 2, show it
    document.getElementById(`step2-${mode}`).classList.add("active");
  } else {
    // For any other step, just show the corresponding step
    document.getElementById(`step${step}`).classList.add("active");
  }

  // Update the current step
  currentStep = step;
  console.log(
    `Current step is now: ${currentStep}, last mode used: ${lastMode}`
  ); // Debug output
}

$(document).ready(function () {
  const educationTemplate = `
    <div class="education-block">
        <div class="form-grid">
            <div class="form-group">
                <label>Título</label>
                <input type="text" name="titulo[]" required>
            </div>
            <div class="form-group">
                <label>País</label>
                <select name="pais[]">
                    <option value="">Seleccione una opción</option>
                    <!-- Opciones de país -->
                </select>
            </div>
            <div class="form-group">
                <label>Institución</label>
                <input type="text" name="institucion[]" required>
            </div>
            <div class="form-group">
                <label>Área de estudio</label>
                <select name="area-estudio[]">
                    <option value="">Seleccione una opción</option>
                    <!-- Opciones de área de estudio -->
                </select>
            </div>
            <div class="form-group">
                <label>Nivel de estudio</label>
                <select name="nivel-estudio[]">
                    <option value="">Seleccione una opción</option>
                    <!-- Opciones de nivel de estudio -->
                </select>
            </div>
            <div class="form-group">
                <label>Estado de estudio</label>
                <select name="estado-estudio[]">
                    <option value="">Seleccione una opción</option>
                    <!-- Opciones de estado de estudio -->
                </select>
            </div>
            <div class="form-group">
                <label>Fecha de inicio</label>
                <input type="date" name="fecha-inicio[]">
            </div>
            <div class="form-group">
                <label>Fecha de finalización (o previsto)</label>
                <input type="date" name="fecha-finalizacion[]">
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <textarea name="descripcion[]" rows="3"></textarea>
            </div>
            <button type="button" class="remove-education">Eliminar</button>
        </div>
    </div>`;

  // Plantilla para idiomas
  const languageTemplate = ` <div class="language-block form-grid">
        <!-- Campo de texto para el idioma -->
        <div class="form-group">
            <label for="idioma">Idioma</label>
            <input type="text" id="idioma" name="idioma[]" placeholder="Idioma" required>
        </div>
        <!-- Selector para nivel escrito -->
        <div class="form-group">
            <label for="nivel-escrito">Nivel Escrito</label>
            <select id="nivel-escrito" name="nivel-escrito[]">
                <option value="basico">Básico</option>
                <option value="intermedio">Intermed tie</option>
                <option value="avanzado">Avanzado</option>
                <option value="nativo">Nativo</option>
            </select>
        </div>
        <!-- Selector para nivel oral -->
        <div class="form-group">
            <label for="nivel-oral">Nivel Oral</label>
            <select id="nivel-oral" name="nivel-oral[]">
                <option value="basico">Básico</option>
                <option value="intermedio">Intermedio</option>
                <option value="avanzado">Avanzado</option>
                <option value="nativo">Nativo</option>
            </select>
        </div>
        <!-- Botón para eliminar idioma -->
        <button type="button" class="remove-language">Eliminar</button>
    </div>
    <button type="button" id="add-language">+ Añadir idioma</button>
</div>`; // Completa con el HTML adecuado para un bloque de idioma

  // Plantilla para experiencia laboral
  const workTemplate = `<div id="work-section">
              <div class="work-block form-grid">
                <!-- Nombre del puesto / Título -->
                <div class="form-group">
                  <label for="puesto">Nombre del puesto / Título</label>
                  <input type="text" id="puesto" name="puesto[]"
                    placeholder="Nombre del puesto" required>
                </div>

                <!-- Jerarquía -->
                <div class="form-group">
                  <label for="jerarquia">Jerarquía</label>
                  <select id="jerarquia" name="jerarquia[]">
                    <option value>Seleccione una opción</option>
                    <!-- Opciones de jerarquía -->
                  </select>
                </div>

                <!-- Nombre de empresa/negocio -->
                <div class="form-group">
                  <label for="empresa">Nombre de empresa / negocio</label>
                  <input type="text" id="empresa" name="empresa[]"
                    placeholder="Nombre de empresa / negocio" required>
                </div>

                <!-- País -->
                <div class="form-group">
                  <label for="pais-trabajo">País</label>
                  <select id="pais-trabajo" name="pais-trabajo[]">
                    <option value>Seleccione una opción</option>
                    <!-- Opciones de país -->
                  </select>
                </div>

                <!-- Tipo de industria -->
                <div class="form-group">
                  <label for="industria">Tipo de industria</label>
                  <select id="industria" name="industria[]">
                    <option value>Seleccione una opción</option>
                    <!-- Opciones de industria -->
                  </select>
                </div>`; // Completa con el HTML adecuado para un bloque de experiencia laboral

  $("#add-education").click(function () {
    var newBlock = $(".education-block:first").clone(true);
    newBlock.find("input, select, textarea").val("");
    newBlock.appendTo("#education-section");
  });

  // Ajuste aquí: Usar closest para asegurar que se selecciona el .education-block
  $("#education-section").on("click", ".remove-education", function () {
    $(this).closest(".education-block").remove();
    if ($(".education-block").length === 0) {
      $("#education-section").append(educationTemplate);
    }
  });

  // Asegurar que siempre hay al menos un bloque de idioma al inicio
  if ($(".language-block").length === 0) {
    $("#languages-section").append(languageTemplate);
  }

  // Añadir idioma
  $("#add-language").click(function () {
    var newLanguage = $(".language-block:first").clone(true);
    newLanguage.find("input, select").val("");
    newLanguage.appendTo("#languages-section");
  });

  // Eliminar idioma
  $("#languages-section").on("click", ".remove-language", function () {
    $(this).closest(".language-block").remove();
    // Asegurar que el botón de añadir idioma sigue existiendo y que hay al menos un bloque de idioma
    if ($(".language-block").length === 0) {
      $("#languages-section").append(languageTemplate);
    }
  });

  // Añadir experiencia laboral
  $("#add-work").click(function () {
    var newWork = $(".work-block:first").clone();
    newWork.find("input").val("");
    newWork.appendTo("#work-section");
  });

  // Eliminar experiencia laboral
  $("#work-section").on("click", ".remove-work", function () {
    $(this).parent(".work-block").remove();
  });
});

$(document).ready(function () {
  $("#skills").select2({
    placeholder: "Selecciona habilidades",
    allowClear: true,
    tags: true, // Permite añadir habilidades que no están predefinidas en las opciones
  });
});
