<?php

    class Session
    {
        /**
         * Define uma variável de sessão.
         *
         * @param string $key A chave para a variável de sessão.
         * @param mixed $value O valor a ser armazenado.
         */
        public static function set(string $key, $value): void
        {
            $_SESSION[$key] = $value;
        }

        /**
         * Obtém uma variável de sessão.
         *
         * @param string $key A chave para a variável de sessão.
         * @param mixed $default O valor padrão se a chave não existir.
         * @return mixed
         */
        public static function get(string $key, $default = null)
        {
            return $_SESSION[$key] ?? $default;
        }

        /**
         * Verifica se uma variável de sessão existe.
         *
         * @param string $key A chave para a variável de sessão.
         * @return bool
         */
        public static function has(string $key): bool
        {
            return isset($_SESSION[$key]);
        }

        /**
         * Remove uma variável de sessão.
         *
         * @param string $key A chave para a variável de sessão.
         */
        public static function remove(string $key): void
        {
            if (isset($_SESSION[$key])) {
                unset($_SESSION[$key]);
            }
        }

        /**
         * Obtém uma mensagem flash e a remove.
         * Mensagens flash são tipicamente para exibição única.
         *
         * @param string $key A chave para a mensagem flash.
         * @param mixed $default O valor padrão se a chave não existir.
         * @return mixed
         */
        public static function flash(string $key, $default = null)
        {
            $value = self::get($key, $default);
            self::remove($key);
            return $value;
        }

        public static function destroy(): void
        {
            session_unset(); // Desdefine todas as variáveis de sessão
            session_destroy(); // Destrói os dados da sessão no servidor
        }
    }
?>