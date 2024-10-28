# Define variables
ZIP_NAME = conekta.zip
FOLDER_NAME = conekta
EXCLUDES = "*.git*" "*.idea*"  "composer.lock" ".gitignore" ".DS_Store" "conekta"

# Target por defecto
all: zip

# Crea el archivo ZIP
zip: $(FOLDER_NAME)
	zip -r $(ZIP_NAME) $(FOLDER_NAME) -x $(EXCLUDES) && rm -rf $(FOLDER_NAME)

# Crea la carpeta conekta y mueve los archivos
$(FOLDER_NAME):
	mkdir -p $@
	cp -r ./* $@  # Copia todos los archivos al directorio conekta
	rm -rf $@/.git  # Elimina la carpeta .git si existe
	rm -rf $@/.idea  # Elimina la carpeta .idea si existe
	rm -f $@/composer.lock  # Elimina el archivo composer.lock si existe
	rm -f $@/.gitignore  # Elimina el archivo .gitignore si existe
	rm -f $@/.DS_Store  # Elimina el archivo .DS_Store si existe

# Clean para eliminar el ZIP y la carpeta temporal
clean:
	rm -rf $(ZIP_NAME) $(FOLDER_NAME)

