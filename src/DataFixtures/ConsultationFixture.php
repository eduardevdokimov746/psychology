<?php

namespace App\DataFixtures;

use App\Entities\Doc\Consultation;
use App\Entities\Doc\PsychologistProfile;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

class ConsultationFixture extends Fixture implements DependentFixtureInterface
{
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function load(ObjectManager $manager): void
    {
        $consultations = [
            [
                'title'       => 'Консультация по видео',
                'price'       => '900',
                'img'         => 'images/consultations/muhovikova.png',
                'duration'    => 60,
                'description' => 'В своей работе всегда иду за клиентом, внимательно прислушиваюсь к его потребностям и создаю такие условия, чтобы он сам нашел решение своей проблемы. На мой взгляд, главная функция психолога – помочь клиенту в помощи самому себе. Основной инструмент такого подхода – эмпатическое слушание, в условиях которого человек может расслабиться и быть собой, высказать всё, что его волнует, не опасаясь критики и осуждения.',
                'user'        => $this->getUserByAvatar('muhovikova.png')
            ],
            [
                'title'       => 'Консультация по видео',
                'price'       => '4850',
                'img'         => 'images/consultations/tilinina.jpg',
                'description' => "<p>ПСИХОЛОГ онлайн. Работа с подсознанием.</p>
<p>Помогаю людям по всему миру выходить из сложных внутренних состояний, таких как:</p>
<br>
<ul style='margin-left:20px;'>
<li>панические атаки, различные страхи и фобии</li>
<li>депрессивные состояния, прокрастинация, отсутствие мотивации что-либо делать</li>
<li>сложности адаптации в социуме, социофобия</li>
<li>сложности в отношениях с партнёром, родителями, детьми</li>
<li>работа с низкой самооценкой</li>
<li>работаем над развитием осознанности, что позволяет человеку в будущем самому выходить из кризисных состояний</li>
</ul>
<br>
<p>На консультациях мы с вами работаем с подавленными чувствами, прорабатываем бессознательные КОРНИ каждой из проблем.</p>
<br>
<p>Каждая консультация длится от 1 до 3,5 часов. 
За это время мы убираем максимальное количество внутреннего дискомфорта.</p>
<br>

<p>
За счёт этой работы поведение и самооценка меняются автоматически, потому что 
уходит глубинная ПРИЧИНА проблемы.
</p>
<br>
<p>
Моими клиентами были русскоговорящие из Латвии, 
Латинской Америки, Литвы, Турции, Белоруссии, США.
</p>

<br>
<p>
А так же клиенты из многочисленных регионов, сёл, небольших и крупных городов России.
</p>

<br>
<p>
Люди разных сфер деятельности:
</p>
<br>

<ul style='margin-left:20px;'>
<li>главные бухгалтера</li>
<li>доктора и кандидаты психологических/медицинских наук</li>
<li>врачи разных направлений</li>
<li>менеджеры</li>
<li>продавцы</li>
<li>работники технических сфер</li>
<li>дизайнеры</li>
<li>бармены и официанты</li>
<li>мастера маникюра, парикмахеры, косметологи</li>
<li>И клиенты многих других специальностей</li>
</ul>
<br>
<p>После консультаций клиенты обретают уверенность в себе, более доверительные и тёплые отношения с близкими, более устойчивую самооценку, веру в себя.
У людей появляется внутренняя мотивация и силы для работы, карьеры. Постепенно растёт финансовое состояние за счёт уверенности в себе и в своих силах.</p>",
                'duration'    => 240,
                'user'        => $this->getUserByAvatar('tilinina.jpg')
            ],
            [
                'title'       => 'Консультация по видео',
                'price'       => '2070',
                'duration'    => 60,
                'img'         => 'images/consultations/sviridova.png',
                'description' => "<p>Я – практикующий психолог для женщин.</p>
<p>Помогаю женщинам вернуть самооценку и найти свое предназначение 
(какая я? для чего я?)</p>
<p>Основной упор – работа с последствиями психологической травмы детства.</p>
<b>Как ощущает себя женщина, несущая в себе травмирующее прошлое?</b>
<ul style='margin-left:20px;'>
<li>истощенной, уставшей, подавленной, растерянной</li>
<li>испуганной, виноватой, раздраженной, никчемной</li>
<li>бессильной, сомневающейся, неуверенной, нерешительной</li>
<li>боюсь сказать, спросить, ответить</li>
<li>боюсь совершить ошибку</li>
<li>боюсь быть собой</li>
</ul>
<br>
<b>Эти последствия приводят к ощущению, что «моя жизнь пришла в упадок»:</b>
<ul style='margin-left:20px;'>
<li>сложно добиться успеха</li>
<li>выбираю не тех мужчин, работу, круг общения</li>
<li>отдаю всю себя заботе о семье и близких</li>
<li>оставляю все силы на работе, на себя уже не хватает</li>
<li>моя жизнь принадлежит не мне</li>
<li>мои отношения трещат по швам</li>
</ul>
<br>
<b>Что дает глубинная (длительная) работа с последствиями травм?</b>
<p>Позволяет женщине собрать себя воедино:</p>
<ul style='margin-left:20px;'>
<li>ощутить свою территорию и пространство, где безопасно и есть границы</li>
<li>восстановить контакт с телом и гордость за него, не взирая на несовершенства и ограничения</li>
<li>позволить себе действовать и проявляться, высказывать свое мнение без страха, стыда и чувства вины</li>
<li>обрести чувство достоинства и уважение к себе</li>
<li>найти свое осознанное дело, опираясь на желание, способности и интерес</li>
<li>жить в соответствии со своим внутренним ритмом, темпом и циклами</li>
</ul>
<br>
<p>Женщина, которая умеет слышать себя, способна жить и творить, а не чувствовать свою жизнь и себя «прокисшей».</p>
<p>Для работы с внутренним миром женщины я использую простые и доступные символические образы и сюжеты.</p>
<p>Важная часть терапии – акценты на работу с телом – простые и приятные телесные практики, доступные для самостоятельного выполнения.
А так же, символическое рисование, как часть естественного процесса выражение себя.</p>
<p>Такой тонкий и бережный подход позволяет устранить болезненные последствия завладевшей тобой травмы.
</p>
<p>Жить и творить из осознанного ресурса – истинное дело души каждой женщины.</p>
<p>Если важно вернуть себе ощущение целостности, легкости и любви и обрести свое творческое начало, жду на первую встречу.</p>",
                'user'        => $this->getUserByAvatar('sviridova.png')
            ],
            [
                'title'       => 'Консультация по видео/аудио',
                'price'       => '1800',
                'img'         => 'images/consultations/matveev.png',
                'duration'    => 60,
                'description' => "<p>Все психологи (как и люди в целом) по-своему хороши. Почему мои клиенты выбирают именно меня?</p>
<br>
<ul style='margin-left:20px;'>
<li>Если не вижу удовлетворения клиента от проведенного занятия, верну вам деньги;</li>

<li>Ни одного накрученного отзыва (более 60-ти), любой можно (и нужно) проверить;</li>

<li>Оставляю за клиентом право выбрать формат общения (переписка с голосовыми сообщениями (90 минут) либо часовая консультация по Скайпу). Опыт работы говорит о том, что формат не влияет на эффективность. Просто попробуйте и убедитесь в этом сами;</li>

<li>В зрелом возрасте поступил и благополучно окончил университет (специальность 'психологическое консультирование'). Не годовые курсы переподготовки, как это часто бывает, а полноценное образование;</li>

<li>Низкая стоимость обусловлена большим потоком клиентов. Сейчас такая стратегия.</li>

<li>Отдаю себе отчёт в том, что психолог - это не друг за деньги: к процессу консультирования отношусь скорее, как к ремонту двигателя, то есть ни на минуту не позволяю себе расслабиться и в каждый момент времени держу в голове структуру, осознавая, в каком направлении двигаюсь. Могу ответить за каждое сказанное слово и заданный вопрос, объяснить, зачем это было сделано. Также не трачу время консультации на заполнение с клиентом опросников и методик. Если в этом есть необходимость, задаю в качестве домашнего задания;</li>

<li>В анонимности заинтересован не меньше вашего, так как это моя репутация;</li>

<li>Не использую гипноз, как это сейчас часто бывает. Также, на моих сессиях Вам не придется усиленно дышать до потемнения в глазах, чтобы войти в состояние измененного сознания. Ставлю безопасность клиента на первое место.</li>

<li>Время консультации может быть увеличено (в пределах разумного) без доплаты. На самом интересном месте никто Вас не выгонит из Скайп звонка.</li>

<li>Со мной Вам не придется думать о том, что говорить во время сессии. Полностью беру инициативу в свои руки - Вам нужно будет лишь отвечать на мои вопросы.</li>
</ul>",
                'user'        => $this->getUserByAvatar('matveev.png')
            ],
            [
                'title'       => 'Ответ психолога',
                'price'       => '270',
                'img'         => 'images/consultations/otvet4.png',
                'description' => 'Напишите свое письмо психологу. Расскажите о вашей проблеме, задайте волнующие вас вопросы. Психолог ответит вам в течение 24 часов. Ответ появится в личном кабинете. Ваш вопрос и ответ психолога нигде не публикуются, все конфиденциально!',
                'user'        => null
            ],
            [
                'title'       => 'Консультация по видео',
                'price'       => '1080',
                'img'         => 'images/consultations/larionova.png',
                'duration'    => 60,
                'description' => 'Я стараюсь и понимаю людей, слышу вашу точку зрения. Поддерживаю и бережно отношусь к своим клиентам!

Интересы: арт-терапия, эмоционально образная терапия.

Консультация длится 60-80 минут.',
                'user'        => $this->getUserByAvatar('larionova.png')
            ],
            [
                'title'       => 'Консультация по видео',
                'price'       => '1350',
                'img'         => 'images/consultations/tuzba.png',
                'duration'    => 60,
                'description' => "<p>Приветствую Вас. Благодарю, за доверие и интерес к моей работе.
Предоставляю помощь в сферах психологии и интегративной медицины.</p>
<br>
<p>Консультация длится <b>1-1,3 часа</b>.</p>
<br>
<p>Работаю с людьми, которые хотят улучшить качество своей жизни.</p>
<p>Помогаю обрести веру в себя и вернуть самооценку, найти потерянный контакт со 
своими чувствами, желаниями и душой.</p>
<p>Беру на себя ваше состояние и проблему, погружаюсь в вашу тревогу и, 
будучи психоаналитиком обрабатываю её и ищу с пути разрешения ситуации. 
Подходящей именно Вам, учитывая особенности вашей жизни, воспитания и прошлого опыта. 
Личный опыт выхода из сект, верований и традиций, спасение своей шкуры и жизни — 
даёт мне способность удержаться одновременно в сознании и в бессознательном, 
расшифровать импульсы посылаемые человеком и помочь ему, предоставляя интерпретации 
и альтернативы действий в реальности, конечно в мере своих возможностей и 
возможностей восприятия (сознания) человека.",
                'user'        => $this->getUserByAvatar('tuzba.png')
            ],
            [
                'title'       => 'Консультация по видео',
                'price'       => '1260',
                'duration'    => 60,
                'img'         => 'images/consultations/moiseeva.png',
                'description' => 'Внимательная, доброжелательная. Индивидуальный подход.',
                'user'        => $this->getUserByAvatar('moiseeva.png')
            ],
            [
                'title'       => 'Консультация по переписке',
                'price'       => '900',
                'duration'    => 60,
                'img'         => 'images/consultations/1.jpg',
                'description' => "<p>Индивидуально подхожу к вашей проблеме. Доброжелательная, понимающая, искренне хочу вам помочь. 26 лет. Опыт более 4 лет.</p>
<br>
<b> Тебе ко мне, если:</b>
<ul style='margin-left:20px;'>
<li>тебе плохо, грустно, тяжело;</li>

<li>ты не поймешь, что с тобой происходит и как дальше жить;</li>
<li>ты понимаешь, что с тобой происходит, но не знаешь, как себе помочь;</li>
<li>ты хочешь изменить себя и свою жизнь, но не знаешь как.</li>
</ul>",
                'user'        => $this->getUserByAvatar('1.jpg')
            ],
            [
                'title'       => 'Консультация по видео',
                'price'       => '2250',
                'duration'    => 55,
                'img'         => 'images/consultations/petrova.png',
                'description' => "<p>Меня зовут Анна, я кризисный психолог.</p>
<br>
<p>Помогаю справиться с тяжёлыми состояниями и найти выход из трудной ситуации. А может, просто наладить контакт с собой, начать лучше слышать и понимать себя.
Работаю с психологической травмой (как кризисный психолог-травматерапевт).</p>
<br>
<b>У нас есть с вами два варианта взаимодействия:</b>
<p>1. Краткосрочное психологическое консультирование (от 1 до 10 сессий).</p>
<p>Основной упор в консультировании я делаю на детальный разбор волнующей проблемы, 
причин и следствий. Рассказываю о механизмах работы психики, чтобы вы понимали, что и почему происходит - для меня это очень важный момент.
</p>
<p>В результате работы приходит понимание:</p>
<ul style='margin-left:20px;'>
<li>ЧТО именно с вами происходит, как внутри, так и снаружи</li>
<li>ПОЧЕМУ это происходит, почему у вас возникают соотвествующие чувства и мысли</li>
<li>КАК это изменить, какие действия приведут к желаемому результату</li>
</ul>
<br>
<p>2. Долгосрочная терапия на регулярной основе (от полугода).</p>
<p>Здесь мы занимаемся именно терапией. Выстраиваем контакт, учимся 
взаимодействию друг с другом, проживанию эмоций, новым необходимым в жизни навыкам. 
Здесь мы прорабатываем глубокие, личные и непростые запросы, травмы. 
Позволяя психике исцеляться и развиваться в своём ритме. Без спешки и с 
пониманием процесса.
</p>
<p>Работаю исключительно со взрослыми людьми старше 18 лет.</p>",
                'user'        => $this->getUserByAvatar('petrova.png')
            ],
            [
                'title'       => 'Разбор рисунка',
                'price'       => '135',
                'img'         => 'images/consultations/4.jpg',
                'description' => "<p>Проективный тест 'Несуществующее животное' позволяет выявить существующие проблемы, охарактеризовать ваше текущее состояние. Часто становятся понятны причины внутренних проблем. Тест показывает, на что человек способен, что ему сейчас дано, на что он сейчас настроен, что чувствует.</p>
<br><br>

<b>Задание:</b>
<ul>
<li>Нарисуйте несуществующее животное, то есть выдумайте его сами и изобразите на листе бумаги (лист А4, положить горизонтально). </li>
<li>В идеале сделайте рисунок цветным (карандашами, красками, фломастерами), хотя этот пункт не обязателен. </li>
<li>Придумайте для этого животного название, опишите, где оно живет, что ест, с кем дружит. То есть расскажите поподробнее всё, что можете об этом животном. </li>
<li>По времени у вас это займет минут 30-40. </li>
<li>Сфотографируйте/отсканируйте этот рисунок, укажите ваш пол и возраст. </li>
<li>Фотографируем весь лист, даже его 'белые' части. </li>

</ul>
<br>

<p>Разбор рисунка появится в вашем личном кабинете в течение <b>24 часов</b>.</p>
",
                'user'        => $this->getUserByAvatar('4.jpg')
            ],
            [
                'title'       => 'Консультация по видео',
                'price'       => '1170',
                'duration'    => 60,
                'img'         => 'images/consultations/korostileva.png',
                'description' => 'Дружелюбна и открыта. Ищу нестандартные решения проблемы, если не получается решить стандартно.',
                'user'        => $this->getUserByAvatar('korostileva.png')
            ],
        ];


        foreach ($consultations as $consultation) {
            $con = new Consultation(
                $consultation['title'],
                $consultation['description'],
                $consultation['price'],
                $consultation['img']);

            $con->setPsychologistProfile($consultation['user'])
                ->setDuration($consultation['duration'] ?? null);

            $manager->persist($con);
        }

        $manager->flush();
    }

    protected function getUserByAvatar(string $avatar): ?PsychologistProfile
    {
        return $this->entityManager->getRepository('Doc:PsychologistProfile')
            ->createQueryBuilder('pp')
            ->where('pp.avatar LIKE :avatar')
            ->setParameter('avatar', '%' . $avatar . '%')
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getDependencies()
    {
        return [
            PsychologistProfileFixture::class
        ];
    }
}