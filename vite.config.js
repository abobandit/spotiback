import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
//https://www.youtube.com/watch?v=OjsGxSMn1Qk - работа с файлами
//https://www.youtube.com/watch?v=5DZR4Aa_94M - регистрация и аутентификация
//https://www.youtube.com/watch?v=FUM9t1Mh9c0 - модели связи рес-сы продолжение
//https://www.youtube.com/watch?v=Na3jkHkEiAM - модели связи рес-сы
// https://www.youtube.com/watch?v=l2litwuUt4g - валидация
//https://www.youtube.com/watch?v=rycFr_Z-zBY - круд
// https://www.youtube.com/watch?v=qYKwjM6Rgg4 - маршруты и контроллеры
