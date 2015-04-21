<?php

/**
 * DataBase Populator
 * Generate random names, surnames, text etc. for database population
 */
class DatabasePopulator {
    private $intRange = array(1, 1000);
    private $names = array(
      'name'      => array(
        'Иван', 'Сергей', 'Петр', 'Мария', 'Александра'
      ),
      'surname'   => array(
        'Иванов', 'Воробей', 'Дорк', 'Ким', 'Кан',
        'Сан',
      ),
    );

    private $usernames = array(
      'foo', 'bar', 'john', 'mrniceguy', 'furry', 'hotdog',
      'mark', 'subzero', 'naruto', 'paul', 'ikki', 'gandalf',
      'sauron', 'frodo', 'doe', 'ronaldo', 'tux', 'gentleman',
      'ranger', 'ehonda', 'fanboy', 'sushi', 'bean', 'chucknorris',
      'amazing', 'mrlegend', 'wonderwall', 'hackme', 'googleboy',
    );

    private $strings = array(
      'Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты.',
      'Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана.',
      'Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами.',
      'Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот.',
      'Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни.',
      'Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики.',
      'Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой,
      но текст не дал сбить себя с толку.',
      'Он собрал семь своих заглавных букв, подпоясал инициал за пояс и пустился в дорогу.',
      'Взобравшись на первую вершину курсивных гор, бросил он последний взгляд назад,
      на силуэт своего родного города Буквоград, на заголовок деревни Алфавит
      и на подзаголовок своего переулка Строчка.',
      'Грустный реторический вопрос скатился по его щеке и он продолжил свой путь.',
      'По дороге встретил текст рукопись.'
    );

    public function getInt($min=null, $max=null) {
        $min = isset($min) ? $min : $this->intRange[0];
        $max = isset($max) ? $max : $this->intRange[1];
        return mt_rand($min, $max);
    }

    public function getDate() {
        return date("Y-m-d", rand(1 , time()));
    }

    public function getTime() {
        return date("H:i:s", rand(1 , time()));
    }

    public function getDatetime() {
        return date("Y-m-d H:i:s", rand(1 , time()));
    }

    public function getTimestamp() {
        return mktime(0, 0, 0, mt_rand(1,12), mt_rand(1,28), mt_rand(1970, date('Y')));
    }

    public function getAge() {
        return mt_rand(10, 120);
    }

    public function getString() {
        return $this->strings[mt_rand(0, count($this->strings)-1)];
    }

    public function getText() {
        return $this->getString() . ' ' . $this->getString() . ' ' . $this->getString();
    }

    public function getName() {
        shuffle($this->names['name']);
        shuffle($this->names['surname']);
        return $this->names['name'][0] . ' ' . $this->names['surname'][0];
    }

    public function getUsername() {
        shuffle($this->usernames);
        return $this->usernames[0] . mt_rand(1, 9999);
    }
}
