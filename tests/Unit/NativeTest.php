<?php

/**
 * This file is part of the "laravel-lang/native-locale-names" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2023 Laravel Lang Team
 * @license MIT
 *
 * @see https://laravel-lang.com
 */

declare(strict_types=1);

use LaravelLang\LocaleList\Locale;
use LaravelLang\NativeLocaleNames\Enums\SortBy;
use LaravelLang\NativeLocaleNames\LocaleNames;

it('should not be a clone of the English version')
    ->expect(fn () => LocaleNames::get())
    ->toBeSameCount()
    ->toBe(sourceLocale('_native'))
    ->not->toBe(sourceLocale('en'))
    ->not->toBeEmpty();

it('should check the returned list in French')
    ->expect(fn () => LocaleNames::get(Locale::French, SortBy::Key))
    ->toBe([
        'af'         => 'Afrikaans',
        'ak'         => 'Akan',
        'am'         => 'Amharique',
        'ar'         => 'Arabe',
        'as'         => 'Assamais',
        'ay'         => 'Aymara',
        'az'         => 'Azerbaïdjanais',
        'be'         => 'Biélorusse',
        'bg'         => 'Bulgare',
        'bho'        => 'Bhodjpouri',
        'bm'         => 'Bambara',
        'bn'         => 'Bengali',
        'bs'         => 'Bosniaque',
        'ca'         => 'Catalan',
        'ceb'        => 'Cebuano',
        'ckb'        => 'Sorani',
        'co'         => 'Corse',
        'cs'         => 'Tchèque',
        'cy'         => 'Gallois',
        'da'         => 'Danois',
        'de'         => 'Allemand',
        'de_CH'      => 'Allemand (Suisse)',
        'doi'        => 'Dogri',
        'dv'         => 'Maldivien',
        'ee'         => 'Éwé',
        'el'         => 'Grec',
        'en'         => 'Anglais',
        'eo'         => 'Espéranto',
        'es'         => 'Espagnol',
        'et'         => 'Estonien',
        'eu'         => 'Basque',
        'fa'         => 'Persan',
        'fi'         => 'Finnois',
        'fil'        => 'Filipino',
        'fr'         => 'Français',
        'fy'         => 'Frison Occidental',
        'ga'         => 'Irlandais',
        'gd'         => 'Gaélique Écossais',
        'gl'         => 'Galicien',
        'gn'         => 'Guarani',
        'gom'        => 'Konkani De Goa',
        'gu'         => 'Goudjarati',
        'ha'         => 'Haoussa',
        'haw'        => 'Hawaïen',
        'he'         => 'Hébreu',
        'hi'         => 'Hindi',
        'hmn'        => 'Hmong',
        'hr'         => 'Croate',
        'ht'         => 'Créole Haïtien',
        'hu'         => 'Hongrois',
        'hy'         => 'Arménien',
        'id'         => 'Indonésien',
        'ig'         => 'Igbo',
        'ilo'        => 'Ilocano',
        'is'         => 'Islandais',
        'it'         => 'Italien',
        'ja'         => 'Japonais',
        'ka'         => 'Géorgien',
        'kk'         => 'Kazakh',
        'km'         => 'Khmer',
        'kn'         => 'Kannada',
        'ko'         => 'Coréen',
        'kri'        => 'Krio',
        'ky'         => 'Kirghize',
        'la'         => 'Latin',
        'lb'         => 'Luxembourgeois',
        'lg'         => 'Ganda',
        'ln'         => 'Lingala',
        'lo'         => 'Lao',
        'lt'         => 'Lituanien',
        'lus'        => 'Lushaï',
        'lv'         => 'Letton',
        'mai'        => 'Maïthili',
        'mg'         => 'Malgache',
        'mi'         => 'Maori',
        'mk'         => 'Macédonien',
        'ml'         => 'Malayalam',
        'mn'         => 'Mongol',
        'mni_Mtei'   => 'Manipuri',
        'mr'         => 'Marathi',
        'ms'         => 'Malais',
        'mt'         => 'Maltais',
        'my'         => 'Birman',
        'nb'         => 'Norvégien Bokmål',
        'ne'         => 'Népalais',
        'nl'         => 'Néerlandais',
        'nn'         => 'Norvégien Nynorsk',
        'nso'        => 'Sotho Du Nord',
        'ny'         => 'Chewa',
        'oc'         => 'Occitan',
        'om'         => 'Oromo',
        'or'         => 'Odia',
        'pa'         => 'Pendjabi',
        'pl'         => 'Polonais',
        'ps'         => 'Pachto',
        'pt'         => 'Portugais',
        'pt_BR'      => 'Portugais (Brésil)',
        'qu'         => 'Quechua',
        'ro'         => 'Roumain',
        'ru'         => 'Russe',
        'rw'         => 'Kinyarwanda',
        'sa'         => 'Sanskrit',
        'sc'         => 'Sarde',
        'sd'         => 'Sindhi',
        'si'         => 'Cingalais',
        'sk'         => 'Slovaque',
        'sl'         => 'Slovène',
        'sm'         => 'Samoan',
        'sn'         => 'Shona',
        'so'         => 'Somali',
        'sq'         => 'Albanais',
        'sr_Cyrl'    => 'Serbe',
        'sr_Latn'    => 'Serbe',
        'sr_Latn_ME' => 'Serbe (Monténégro)',
        'st'         => 'Sotho Du Sud',
        'su'         => 'Soundanais',
        'sv'         => 'Suédois',
        'sw'         => 'Swahili',
        'ta'         => 'Tamoul',
        'te'         => 'Télougou',
        'tg'         => 'Tadjik',
        'th'         => 'Thaï',
        'ti'         => 'Tigrigna',
        'tk'         => 'Turkmène',
        'tl'         => 'Tagalog',
        'tr'         => 'Turc',
        'ts'         => 'Tsonga',
        'tt'         => 'Tatar',
        'ug'         => 'Ouïghour',
        'uk'         => 'Ukrainien',
        'ur'         => 'Ourdou',
        'uz_Cyrl'    => 'Ouzbek',
        'uz_Latn'    => 'Ouzbek',
        'vi'         => 'Vietnamien',
        'xh'         => 'Xhosa',
        'yi'         => 'Yiddish',
        'yo'         => 'Yoruba',
        'zh_CN'      => 'Chinois (Chine)',
        'zh_HK'      => 'Chinois (R.a.s. Chinoise De Hong Kong)',
        'zh_TW'      => 'Chinois (Taïwan)',
        'zu'         => 'Zoulou',
    ]);

it('should check the returned list in Ukrainian')
    ->expect(fn () => LocaleNames::get(Locale::Ukrainian, SortBy::Key))
    ->toBe([
        'af'         => 'Африкаанс',
        'ak'         => 'Акан',
        'am'         => 'Амхарська',
        'ar'         => 'Арабська',
        'as'         => 'Асамська',
        'ay'         => 'Аймара',
        'az'         => 'Азербайджанська',
        'be'         => 'Білоруська',
        'bg'         => 'Болгарська',
        'bho'        => 'Бходжпурі',
        'bm'         => 'Бамбара',
        'bn'         => 'Бенгальська',
        'bs'         => 'Боснійська',
        'ca'         => 'Каталонська',
        'ceb'        => 'Себуанська',
        'ckb'        => 'Центральнокурдська',
        'co'         => 'Корсиканська',
        'cs'         => 'Чеська',
        'cy'         => 'Валлійська',
        'da'         => 'Данська',
        'de'         => 'Німецька',
        'de_CH'      => 'Німецька (Швейцарія)',
        'doi'        => 'Догрі',
        'dv'         => 'Дивехі',
        'ee'         => 'Еве',
        'el'         => 'Грецька',
        'en'         => 'Англійська',
        'eo'         => 'Есперанто',
        'es'         => 'Іспанська',
        'et'         => 'Естонська',
        'eu'         => 'Баскська',
        'fa'         => 'Перська',
        'fi'         => 'Фінська',
        'fil'        => 'Філіппінська',
        'fr'         => 'Французька',
        'fy'         => 'Західнофризька',
        'ga'         => 'Ірландська',
        'gd'         => 'Шотландська Гельська',
        'gl'         => 'Галісійська',
        'gn'         => 'Гуарані',
        'gom'        => 'Goan Konkani',
        'gu'         => 'Гуджараті',
        'ha'         => 'Хауса',
        'haw'        => 'Гавайська',
        'he'         => 'Іврит',
        'hi'         => 'Гінді',
        'hmn'        => 'Хмонг',
        'hr'         => 'Хорватська',
        'ht'         => 'Гаїтянська Креольська',
        'hu'         => 'Угорська',
        'hy'         => 'Вірменська',
        'id'         => 'Індонезійська',
        'ig'         => 'Ігбо',
        'ilo'        => 'Ілоканська',
        'is'         => 'Ісландська',
        'it'         => 'Італійська',
        'ja'         => 'Японська',
        'ka'         => 'Грузинська',
        'kk'         => 'Казахська',
        'km'         => 'Кхмерська',
        'kn'         => 'Каннада',
        'ko'         => 'Корейська',
        'kri'        => 'Krio',
        'ky'         => 'Киргизька',
        'la'         => 'Латинська',
        'lb'         => 'Люксембурзька',
        'lg'         => 'Ганда',
        'ln'         => 'Лінгала',
        'lo'         => 'Лаоська',
        'lt'         => 'Литовська',
        'lus'        => 'Мізо',
        'lv'         => 'Латиська',
        'mai'        => 'Майтхілі',
        'mg'         => 'Малагасійська',
        'mi'         => 'Маорі',
        'mk'         => 'Македонська',
        'ml'         => 'Малаялам',
        'mn'         => 'Монгольська',
        'mni_Mtei'   => 'Маніпурі',
        'mr'         => 'Маратхі',
        'ms'         => 'Малайська',
        'mt'         => 'Мальтійська',
        'my'         => 'Бірманська',
        'nb'         => 'Норвезька (Букмол)',
        'ne'         => 'Непальська',
        'nl'         => 'Нідерландська',
        'nn'         => 'Норвезька (Нюношк)',
        'nso'        => 'Північна Сото',
        'ny'         => 'Ньянджа',
        'oc'         => 'Окситанська',
        'om'         => 'Оромо',
        'or'         => 'Одія',
        'pa'         => 'Панджабі',
        'pl'         => 'Польська',
        'ps'         => 'Пушту',
        'pt'         => 'Португальська',
        'pt_BR'      => 'Португальська (Бразилія)',
        'qu'         => 'Кечуа',
        'ro'         => 'Румунська',
        'ru'         => 'Російська',
        'rw'         => 'Кіньяруанда',
        'sa'         => 'Санскрит',
        'sc'         => 'Сардинська',
        'sd'         => 'Синдхі',
        'si'         => 'Сингальська',
        'sk'         => 'Словацька',
        'sl'         => 'Словенська',
        'sm'         => 'Самоанська',
        'sn'         => 'Шона',
        'so'         => 'Сомалі',
        'sq'         => 'Албанська',
        'sr_Cyrl'    => 'Сербська',
        'sr_Latn'    => 'Сербська',
        'sr_Latn_ME' => 'Сербська (Чорногорія)',
        'st'         => 'Південна Сото',
        'su'         => 'Сунданська',
        'sv'         => 'Шведська',
        'sw'         => 'Суахілі',
        'ta'         => 'Тамільська',
        'te'         => 'Телугу',
        'tg'         => 'Таджицька',
        'th'         => 'Тайська',
        'ti'         => 'Тигринья',
        'tk'         => 'Туркменська',
        'tl'         => 'Тагальська',
        'tr'         => 'Турецька',
        'ts'         => 'Тсонга',
        'tt'         => 'Татарська',
        'ug'         => 'Уйгурська',
        'uk'         => 'Українська',
        'ur'         => 'Урду',
        'uz_Cyrl'    => 'Узбецька',
        'uz_Latn'    => 'Узбецька',
        'vi'         => 'Вʼєтнамська',
        'xh'         => 'Кхоса',
        'yi'         => 'Їдиш',
        'yo'         => 'Йоруба',
        'zh_CN'      => 'Китайська (Китай)',
        'zh_HK'      => 'Китайська (Гонконг, Оар Китаю)',
        'zh_TW'      => 'Китайська (Тайвань)',
        'zu'         => 'Зулуська',
    ]);
