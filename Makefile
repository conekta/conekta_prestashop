# Comando principal
zip:
	zip -r conekta-prestashop ./ -x '*.git*'  -x '*.idea*' -x '*.github*' -x 'node_modules*'

.PHONY: zip
