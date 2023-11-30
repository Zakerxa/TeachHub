<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use HasFactory;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $jayParsedAry = [
            "data" => [
                [
                    "eng" => "Magway Region",
                    "mm" => "မကွေးတိုင်းဒေသကြီး",
                    "lat" => "20.1500",
                    "lng" => "94.9500",
                    "capital" => "Magway",
                    "districts" => [
                        [
                            "eng" => "Gangaw",
                            "mm" => "ဂန့်ဂေါ",
                            "townships" => [
                                [
                                    "eng" => "Gangaw",
                                    "mm" => "ဂန့်ဂေါမြို့နယ်"
                                ],
                                [
                                    "eng" => "Saw",
                                    "mm" => "ဆောမြို့နယ်"
                                ],
                                [
                                    "eng" => "Tilin",
                                    "mm" => "ထီးလင်းမြို့နယ်"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Magway",
                            "mm" => "မကွေး",
                            "townships" => [
                                [
                                    "eng" => "Chauck",
                                    "mm" => "ချောက်"
                                ],
                                [
                                    "eng" => "Magway",
                                    "mm" => "မကွေး"
                                ],
                                [
                                    "eng" => "Myothit",
                                    "mm" => "မြို့သစ်"
                                ],
                                [
                                    "eng" => "Natmauk",
                                    "mm" => "နတ်မောက်"
                                ],
                                [
                                    "eng" => "Taungdwingyi",
                                    "mm" => "တောင်တွင်းကြီး"
                                ],
                                [
                                    "eng" => "Yenangyaung",
                                    "mm" => "ရေနံချောင်း"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Minbu",
                            "mm" => "မင်းဘူး",
                            "townships" => [
                                [
                                    "eng" => "Minbu",
                                    "mm" => "မင်းဘူး(စကု)"
                                ],
                                [
                                    "eng" => "Ngape",
                                    "mm" => "ငဖဲ"
                                ],
                                [
                                    "eng" => "Pwintbyu",
                                    "mm" => "ပွင့်ဖြူ"
                                ],
                                [
                                    "eng" => "Salin",
                                    "mm" => "စလင်း"
                                ],
                                [
                                    "eng" => "Sidoktaya",
                                    "mm" => "စေတုတ္တရာ"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Pakokku",
                            "mm" => "ပခုက္ကူ",
                            "townships" => [
                                [
                                    "eng" => "Pakokku",
                                    "mm" => "ပခုက္ကူ"
                                ],
                                [
                                    "eng" => "Seikphyu",
                                    "mm" => "ဆိပ်ဖြူ"
                                ],
                                [
                                    "eng" => "Yesagyo",
                                    "mm" => "ရေစကြို"
                                ],
                                [
                                    "eng" => "Myaing",
                                    "mm" => "မြိုင်"
                                ],
                                [
                                    "eng" => "Pauk",
                                    "mm" => "ပေါက်"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Thayet",
                            "mm" => "သရက်",
                            "townships" => [
                                [
                                    "eng" => "Thayet",
                                    "mm" => "သရက်"
                                ],
                                [
                                    "eng" => "Aunglan",
                                    "mm" => "အောင်လံ"
                                ],
                                [
                                    "eng" => "Sinbaungwe",
                                    "mm" => "ဆင်ပေါင်ဝဲ"
                                ],
                                [
                                    "eng" => "Mindon",
                                    "mm" => "မင်းတုန်း"
                                ],
                                [
                                    "eng" => "Minhla",
                                    "mm" => "မင်းလှ (အထက်မင်းလှ)"
                                ],
                                [
                                    "eng" => "Kamma",
                                    "mm" => "ကံမ"
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    "eng" => "Mandalay Region",
                    "mm" => "မန္တလေးတိုင်းဒေသကြီး",
                    "lat" => "21.9769",
                    "lng" => "96.0869",
                    "capital" => "Mandalay",
                    "districts" => [
                        [
                            "eng" => "Kyaukse",
                            "mm" => "ကျောက်ဆည်",
                            "townships" => [
                                [
                                    "eng" => "Kyaukse",
                                    "mm" => "ကျောက်ဆည်"
                                ],
                                [
                                    "eng" => "Myittha",
                                    "mm" => "မြစ်သား"
                                ],
                                [
                                    "eng" => "Sintgaing",
                                    "mm" => "စဉ့်ကိုင်"
                                ],
                                [
                                    "eng" => "Tada-U",
                                    "mm" => "တံတားဦး"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Mandalay",
                            "mm" => "မန္တလေး",
                            "townships" => [
                                [
                                    "eng" => "Amarapura",
                                    "mm" => "အမရပူရ"
                                ],
                                [
                                    "eng" => "Aungmyethazan",
                                    "mm" => "အောင်မြေသာဇံ"
                                ],
                                [
                                    "eng" => "Chanayethazan",
                                    "mm" => "ချမ်းအေးသာဇံ"
                                ],
                                [
                                    "eng" => "Chanmyathazi",
                                    "mm" => "ချမ်းမြသာစည်"
                                ],
                                [
                                    "eng" => "Mahaaungmye",
                                    "mm" => "မဟာအောင်မြေ"
                                ],
                                [
                                    "eng" => "Patheingyi",
                                    "mm" => "ပုသိမ်ကြီး"
                                ],
                                [
                                    "eng" => "Pyigyidagun",
                                    "mm" => "ပြည်ကြီးတံခွန်"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Meiktila",
                            "mm" => "မိတ္ထီလာ",
                            "townships" => [
                                [
                                    "eng" => "Mahlaing",
                                    "mm" => "မလှိုင်"
                                ],
                                [
                                    "eng" => "Meiktila",
                                    "mm" => "မိတ္ထီလာ"
                                ],
                                [
                                    "eng" => "Thazi",
                                    "mm" => "သာစည်"
                                ],
                                [
                                    "eng" => "Wundwin",
                                    "mm" => "ဝမ်းတွင်း"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Myingyan",
                            "mm" => "မြင်းခြံ",
                            "townships" => [
                                [
                                    "eng" => "Myingyan",
                                    "mm" => "မြင်းခြံ"
                                ],
                                [
                                    "eng" => "Natogyi",
                                    "mm" => "နွားထိုးကြီး"
                                ],
                                [
                                    "eng" => "Nganzun",
                                    "mm" => "ငါန်းဇွန်"
                                ],
                                [
                                    "eng" => "Thaungtha",
                                    "mm" => "တောင်သာ"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Nyaung-U",
                            "mm" => "ညောင်ဦး",
                            "townships" => [
                                [
                                    "eng" => "Nyaung-U",
                                    "mm" => "ညောင်ဦး"
                                ],
                                [
                                    "eng" => "Kyaukpadaung",
                                    "mm" => "ကျောက်ပန်းတောင်း"
                                ],
                                [
                                    "eng" => "Ngathayauk",
                                    "mm" => "ငါ့သရောက်"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Pyinoolwin",
                            "mm" => "ပြင်ဦးလွင်",
                            "townships" => [
                                [
                                    "eng" => "Madaya",
                                    "mm" => "မတ္တရာ"
                                ],
                                [
                                    "eng" => "Mogok",
                                    "mm" => "မိုးကုတ်"
                                ],
                                [
                                    "eng" => "Pyinoolwin",
                                    "mm" => "ပြင်ဦးလွင်"
                                ],
                                [
                                    "eng" => "Singu",
                                    "mm" => "စဉ့်ကူ"
                                ],
                                [
                                    "eng" => "Thabeikkyin",
                                    "mm" => "သပိတ်ကျင်း"
                                ],
                                [
                                    "eng" => "Tagaung",
                                    "mm" => "တကောင်း"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Yamethin",
                            "mm" => "ရမည်းသင်း",
                            "townships" => [
                                [
                                    "eng" => "Pyawbwe",
                                    "mm" => "ပျော်ဘွယ်"
                                ],
                                [
                                    "eng" => "Yamethin",
                                    "mm" => "ရမည်းသင်း"
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    "eng" => "Shan State",
                    "mm" => "ရှမ်းပြည်နယ်",
                    "lat" => "20.7833",
                    "lng" => "96.9667",
                    "capital" => "Taunggyi",
                    "districts" => [
                        [
                            "eng" => "Kengtung",
                            "mm" => "ကျိုင်းတုံခရိုင်",
                            "townships" => [
                                [
                                    "eng" => "Kengtung",
                                    "mm" => "ကျိုင်းတုံ"
                                ],
                                [
                                    "eng" => "Mine Khet",
                                    "mm" => "မိုင်းခတ်"
                                ],
                                [
                                    "eng" => "Mine Pyin",
                                    "mm" => "မိုင်းပြင်း"
                                ],
                                [
                                    "eng" => "Mine Yang",
                                    "mm" => "မိုင်းယန်း"
                                ],
                                [
                                    "eng" => "Mine lar",
                                    "mm" => "မိုင်းလား"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Mine Hpayak",
                            "mm" => "မိုင်းဖြတ်ခရိုင်",
                            "townships" => [
                                [
                                    "eng" => "Mineyu",
                                    "mm" => "မိုင်းရှုး"
                                ],
                                [
                                    "eng" => "Mine Hpayak",
                                    "mm" => "မိုင်းဖျန်"
                                ],
                                [
                                    "eng" => "Mine Yawng",
                                    "mm" => "မိုင်းယန်း"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Mine Hsat",
                            "mm" => "မိုင်းဆတ်ခရိုင်",
                            "townships" => [
                                [
                                    "eng" => "Minekoke",
                                    "mm" => "မိုင်းခုတ်"
                                ],
                                [
                                    "eng" => "Monehta",
                                    "mm" => "မုံးထ"
                                ],
                                [
                                    "eng" => "Mine Hsat",
                                    "mm" => "မိုင်းဆတ်"
                                ],
                                [
                                    "eng" => "Mine Ping",
                                    "mm" => "မိုင်းပန်"
                                ],
                                [
                                    "eng" => "Mine Tong",
                                    "mm" => "မိုင်းတုံ"
                                ],
                                [
                                    "eng" => "Ponparkyin",
                                    "mm" => "ပုံပါကျင်"
                                ],
                                [
                                    "eng" => "Tontar",
                                    "mm" => "တုံတာ"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Tachileik",
                            "mm" => "တာချီလိတ်ခရိုင်",
                            "townships" => [
                                [
                                    "eng" => "Tachi leik",
                                    "mm" => "တာချီလိတ်"
                                ],
                                [
                                    "eng" => "Mine Phyat",
                                    "mm" => " မိုင်းဖြတ်"
                                ],
                                [
                                    "eng" => "Mine Yong",
                                    "mm" => " မိုင်းယောင်"
                                ],
                                [
                                    "eng" => "KyaingLap",
                                    "mm" => "ကျိုင်းလပ်"
                                ],
                                [
                                    "eng" => "Talay",
                                    "mm" => "တာလေ"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Kyaukme",
                            "mm" => "ကျောက်မဲခရိုင်",
                            "townships" => [
                                [
                                    "eng" => "Kyaukme",
                                    "mm" => "ကျောက်မဲ"
                                ],
                                [
                                    "eng" => "NaungCho",
                                    "mm" => "နောင်ချို"
                                ],
                                [
                                    "eng" => "Hsipaw",
                                    "mm" => "သီပေါ"
                                ],
                                [
                                    "eng" => "Namtu",
                                    "mm" => "နမ္မတူ"
                                ],
                                [
                                    "eng" => "Namhsan",
                                    "mm" => "နမ့်ဆန်"
                                ],
                                [
                                    "eng" => "Mantong",
                                    "mm" => "မန်တုံ"
                                ],
                                [
                                    "eng" => "Minelon",
                                    "mm" => "မိုင်းလုံ"
                                ],
                                [
                                    "eng" => "Minengaw",
                                    "mm" => "မိုင်းငေါ"
                                ],
                                [
                                    "eng" => "Nawnghkio",
                                    "mm" => "နောင်ခစ်"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Lashio",
                            "mm" => "လားရှိုးခရိုင်",
                            "townships" => [
                                [
                                    "eng" => "Lashio",
                                    "mm" => "လားရှိုး"
                                ],
                                [
                                    "eng" => "Kwanlon",
                                    "mm" => "ကွမ်းလုံ"
                                ],
                                [
                                    "eng" => "Mineyai",
                                    "mm" => "မိုင်းရယ်"
                                ],
                                [
                                    "eng" => "Tangyan",
                                    "mm" => "တန့်ယန်"
                                ],
                                [
                                    "eng" => "Thani",
                                    "mm" => "သိန္"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Laukkaing",
                            "mm" => "လောက်ကိုင်ခရိုင်",
                            "townships" => [
                                [
                                    "eng" => "Laukkaing",
                                    "mm" => "လောက်ကိုင်"
                                ],
                                [
                                    "eng" => "Chinshwehaw",
                                    "mm" => "ချင်းရွှေဟော်"
                                ],
                                [
                                    "eng" => "Konkyan",
                                    "mm" => "ကုန်းကြမ်း"
                                ],
                                [
                                    "eng" => "Mawhtike",
                                    "mm" => "မော်ထိုက်"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Mu Se",
                            "mm" => "မူဆယ်ခရိုင်",
                            "townships" => [
                                [
                                    "eng" => "Kutkai",
                                    "mm" => "ကွတ်ခိုင်"
                                ],
                                [
                                    "eng" => "Mu Se",
                                    "mm" => "မူဆယ်"
                                ],
                                [
                                    "eng" => "Namhkam",
                                    "mm" => "နမ့်ခမ်း"
                                ],
                                [
                                    "eng" => "Manhero",
                                    "mm" => "မန့်ဟီးရိုး (မန်ဟျှိုး)"
                                ],
                                [
                                    "eng" => "Monekoe",
                                    "mm" => "မုန်းကိုး"
                                ],
                                [
                                    "eng" => "Pansai",
                                    "mm" => "ပန်ဆိုင်း (ကြူကုတ်)"
                                ],
                                [
                                    "eng" => "Tamoenye",
                                    "mm" => "တာမိုးညဲ"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Hopang",
                            "mm" => "ဟိုပန်ခရိုင်",
                            "townships" => [
                                [
                                    "eng" => "Hopang",
                                    "mm" => "ဟိုပန်"
                                ],
                                [
                                    "eng" => "Namtit",
                                    "mm" => "နမ့်တစ်"
                                ],
                                [
                                    "eng" => "Panlong",
                                    "mm" => "ပန်လုံ"
                                ],
                                [
                                    "eng" => "Pansang",
                                    "mm" => "ပန်ဆန်း"
                                ],
                                [
                                    "eng" => "Mankan",
                                    "mm" => "မန်ကန်"
                                ],
                                [
                                    "eng" => "Nahpahn",
                                    "mm" => "နားဖန်း"
                                ],
                                [
                                    "eng" => "Pangwaun",
                                    "mm" => "ပန်ဝိုင်"
                                ],
                                [
                                    "eng" => "Mongmao",
                                    "mm" => "မိုင်းမော"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Matman",
                            "mm" => "မက်မန်းခရိုင်",
                            "townships" => [
                                [
                                    "eng" => "ManKan",
                                    "mm" => "မန်ကန်"
                                ],
                                [
                                    "eng" => "Matman",
                                    "mm" => "မက်မန်း"
                                ],
                                [
                                    "eng" => "Namphan",
                                    "mm" => "နားဖန်း"
                                ],
                                [
                                    "eng" => "Pangsang",
                                    "mm" => "ပန်ဆမ်း (ပန်ခမ်း)"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Mongmit",
                            "mm" => "မိုးမိတ်",
                            "townships" => [
                                [
                                    "eng" => "Mongmit",
                                    "mm" => "မိုးမိတ်"
                                ],
                                [
                                    "eng" => "Mabein",
                                    "mm" => "မဘိမ်း"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Langkho",
                            "mm" => "လင်းခေး",
                            "townships" => [
                                [
                                    "eng" => "Langkho",
                                    "mm" => "လင်းခေး"
                                ],
                                [
                                    "eng" => "Mawkmai",
                                    "mm" => "မောက်မယ်"
                                ],
                                [
                                    "eng" => "MongNai",
                                    "mm" => "မိုးနဲ"
                                ],
                                [
                                    "eng" => "MongPan",
                                    "mm" => "မိုင်းပန်"
                                ],
                                [
                                    "eng" => "Homane",
                                    "mm" => "ဟိုမိန်း"
                                ],
                                [
                                    "eng" => "Kengtaung",
                                    "mm" => "ကျိုင်းတောင်း"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Loilen",
                            "mm" => "လွိုင်လင်ခရိုင်",
                            "townships" => [
                                [
                                    "eng" => "Kunhing",
                                    "mm" => "ကွန်ဟိန်း"
                                ],
                                [
                                    "eng" => "Kyethi",
                                    "mm" => "ကျေးသီး"
                                ],
                                [
                                    "eng" => "LaiHka",
                                    "mm" => "လဲချား"
                                ],
                                [
                                    "eng" => "Loilen",
                                    "mm" => "လွိုင်လင်"
                                ],
                                [
                                    "eng" => "MongHsu",
                                    "mm" => "မိုင်းရှူး"
                                ],
                                [
                                    "eng" => "MongKung",
                                    "mm" => "မိုင်းကိုင်"
                                ],
                                [
                                    "eng" => "Nansang",
                                    "mm" => "နမ့်စန်"
                                ],
                                [
                                    "eng" => "Karli",
                                    "mm" => "ကာလိ"
                                ],
                                [
                                    "eng" => "Kholan",
                                    "mm" => "ခိုလမ်"
                                ],
                                [
                                    "eng" => "Minenaung",
                                    "mm" => "မိုင်းနောင်"
                                ],
                                [
                                    "eng" => "Minesan",
                                    "mm" => "မိုင်းစံ (မုန်းဆန်းမြို့)"
                                ],
                                [
                                    "eng" => "Panglong",
                                    "mm" => "ပင်လုံ"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Taunggyi",
                            "mm" => "တောင်ကြီးခရိုင်",
                            "townships" => [
                                [
                                    "eng" => "Taunggyi",
                                    "mm" => "တောင်ကြီး"
                                ],
                                [
                                    "eng" => "Aye Thar Yar",
                                    "mm" => "အေးသာယာ (တောင်ကြီးမြို့သစ်)"
                                ],
                                [
                                    "eng" => "Kyauktalongyi",
                                    "mm" => "ကျောက်တလုံးကြီး"
                                ],
                                [
                                    "eng" => "Shwe Nyaung",
                                    "mm" => "ရွှေညောင်"
                                ],
                                [
                                    "eng" => "Nyaung Shwe",
                                    "mm" => "ညောင်ရွှေ"
                                ],
                                [
                                    "eng" => "Nangpan",
                                    "mm" => "နန်းပန်"
                                ],
                                [
                                    "eng" => "Kalaw",
                                    "mm" => "ကလော"
                                ],
                                [
                                    "eng" => "Aungpan",
                                    "mm" => "အောင်ပန်း "
                                ],
                                [
                                    "eng" => "Yetsouk",
                                    "mm" => "ရပ်စောက်"
                                ],
                                [
                                    "eng" => "Indaw",
                                    "mm" => "အင်တော"
                                ],
                                [
                                    "eng" => "Pekon",
                                    "mm" => "ဖယ်ခုံ"
                                ],
                                [
                                    "eng" => "Hopong",
                                    "mm" => "ဟိုပုံး"
                                ],
                                [
                                    "eng" => "Hsi Hseng",
                                    "mm" => "ဆီဆိုင်"
                                ],
                                [
                                    "eng" => "Pinlaung",
                                    "mm" => "ပင်လောင်း"
                                ],
                                [
                                    "eng" => "Naungtayar",
                                    "mm" => "နောင်တရား"
                                ],
                                [
                                    "eng" => "Pingdaya",
                                    "mm" => "ပင်းတယ"
                                ],
                                [
                                    "eng" => "Ywangan",
                                    "mm" => "ရွာငံ"
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    "eng" => "Ayeyawady Region",
                    "mm" => "ဧရာဝတီတိုင်းဒေသကြီး",
                    "lat" => "16.7667",
                    "lng" => "94.7333",
                    "capital" => "Pathein",
                    "districts" => [
                        [
                            "eng" => "Hinthada",
                            "mm" => "ဟင်္သာတ",
                            "townships" => [
                                [
                                    "eng" => "Hinthada",
                                    "mm" => "ဟင်္သာတ"
                                ],
                                [
                                    "eng" => "Zalun",
                                    "mm" => "ဇလွန်"
                                ],
                                [
                                    "eng" => "Lemyethna",
                                    "mm" => "လေးမျက်နှာ"
                                ],
                                [
                                    "eng" => "Myanaung",
                                    "mm" => "မြန်အောင်"
                                ],
                                [
                                    "eng" => "Kyangin",
                                    "mm" => "ကြံခင်း"
                                ],
                                [
                                    "eng" => "Ingapu",
                                    "mm" => "အင်္ဂပူ"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Labutta",
                            "mm" => "လပွတ္တာ",
                            "townships" => [
                                [
                                    "eng" => "Labutta",
                                    "mm" => "လပွတ္တာ"
                                ],
                                [
                                    "eng" => "Mawlamyinegyun",
                                    "mm" => "မော်လမြိုင်ကျွန်း"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Ma-ubin",
                            "mm" => "မအူပင်",
                            "townships" => [
                                [
                                    "eng" => "Ma-ubin",
                                    "mm" => "မအူပင်"
                                ],
                                [
                                    "eng" => "Pantanaw",
                                    "mm" => "ပန်းတနော်"
                                ],
                                [
                                    "eng" => "Nyaungdon",
                                    "mm" => "ညောင်တုန်း"
                                ],
                                [
                                    "eng" => "Danuphyu",
                                    "mm" => "ဓနုဖြူ"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Myaungmya",
                            "mm" => "မြောင်းမြ",
                            "townships" => [
                                [
                                    "eng" => "Einme",
                                    "mm" => "အိမ်မဲ"
                                ],
                                [
                                    "eng" => "Myaungmya",
                                    "mm" => "မြောင်းမြ"
                                ],
                                [
                                    "eng" => "Wakema",
                                    "mm" => "ဝါးခယ်မ"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Pathein",
                            "mm" => "ပုသိမ်",
                            "townships" => [
                                [
                                    "eng" => "Pathein",
                                    "mm" => "ပုသိမ်"
                                ],
                                [
                                    "eng" => "Kangyidaunk",
                                    "mm" => "ကန်ကြီးထောင့်"
                                ],
                                [
                                    "eng" => "Ngapudaw",
                                    "mm" => "ငပုတော"
                                ],
                                [
                                    "eng" => "Thabaung",
                                    "mm" => "သာပေါင်း"
                                ],
                                [
                                    "eng" => "Kyaunggon",
                                    "mm" => "ကျောင်းကုန်း"
                                ],
                                [
                                    "eng" => "Kyonpyaw",
                                    "mm" => "ကျုံပျော်"
                                ],
                                [
                                    "eng" => "Yekyi",
                                    "mm" => "ရေကြည်"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Pyapon",
                            "mm" => "ဖျာပုံ",
                            "townships" => [
                                [
                                    "eng" => "Pyapon",
                                    "mm" => "ဖျာပုံ"
                                ],
                                [
                                    "eng" => "Bogale",
                                    "mm" => "ဘိုကလေး"
                                ],
                                [
                                    "eng" => "Kyaiklat",
                                    "mm" => "ကျိုက်လတ်"
                                ],
                                [
                                    "eng" => "Dedaye",
                                    "mm" => "ဒေးဒရဲ"
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    "eng" => "Bago Region",
                    "mm" => "ပဲခူးတိုင်းဒေသကြီး",
                    "lat" => "17.3433",
                    "lng" => "96.4981",
                    "capital" => "Bago",
                    "districts" => [
                        [
                            "eng" => "Bago",
                            "mm" => "ပဲခူး",
                            "townships" => [
                                [
                                    "eng" => "Bago",
                                    "mm" => "ပဲခူး"
                                ],
                                [
                                    "eng" => "Kawa",
                                    "mm" => "ကဝ"
                                ],
                                [
                                    "eng" => "Thanatpin",
                                    "mm" => "သနပ်ပင်"
                                ],
                                [
                                    "eng" => "Waw",
                                    "mm" => "ဝေါ"
                                ],
                                [
                                    "eng" => "Daik-U",
                                    "mm" => "ဒိုက်ဦး"
                                ],
                                [
                                    "eng" => "Nyaunglebin",
                                    "mm" => "ညောင်လေးပင်"
                                ],
                                [
                                    "eng" => "Shwegyin",
                                    "mm" => "ရွှေကျင်"
                                ],
                                [
                                    "eng" => "Madauk",
                                    "mm" => "မဒေါက်"
                                ],
                                [
                                    "eng" => "Pyuntaza",
                                    "mm" => "ပြွန်တန်ဆာ"
                                ],
                                [
                                    "eng" => "Kyauktaga",
                                    "mm" => "ကျောက်တံခါး"
                                ],
                                [
                                    "eng" => "Penwegon",
                                    "mm" => "ပဲနွယ်ကုန်း"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Taungoo",
                            "mm" => "တောင်ငူ",
                            "townships" => [
                                [
                                    "eng" => "Taungoo",
                                    "mm" => "တောင်ငူ"
                                ],
                                [
                                    "eng" => "Yedashe",
                                    "mm" => "ရေတာရှည်"
                                ],
                                [
                                    "eng" => "Kyaukkyi",
                                    "mm" => "ကျောက်ကြီး"
                                ],
                                [
                                    "eng" => "Pyu",
                                    "mm" => "ဖြူး"
                                ],
                                [
                                    "eng" => "Oktwin",
                                    "mm" => "အုတ်တွင်း"
                                ],
                                [
                                    "eng" => "Htantabin",
                                    "mm" => "ထန်းတပင်"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Pyay",
                            "mm" => "ပြည်",
                            "townships" => [
                                [
                                    "eng" => "Pyay",
                                    "mm" => "ပြည်"
                                ],
                                [
                                    "eng" => "Paukkaung",
                                    "mm" => "ပေါက်ခေါင်း"
                                ],
                                [
                                    "eng" => "Paungdale",
                                    "mm" => "ပေါင်းတည်"
                                ],
                                [
                                    "eng" => "Padaung",
                                    "mm" => "ပန်းတောင်း"
                                ],
                                [
                                    "eng" => "Thegon",
                                    "mm" => "သဲကုန်း"
                                ],
                                [
                                    "eng" => "Shwedaung",
                                    "mm" => "ရွှေတောင်"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Thayarwady",
                            "mm" => "သာယာဝတီ",
                            "townships" => [
                                [
                                    "eng" => "Tharrawaddy",
                                    "mm" => "သာယာဝတီ"
                                ],
                                [
                                    "eng" => "Thonze",
                                    "mm" => "သုံးဆယ်"
                                ],
                                [
                                    "eng" => "Letpadan",
                                    "mm" => "လက်ပံတန်း"
                                ],
                                [
                                    "eng" => "Minhla",
                                    "mm" => "မင်းလှမြိ"
                                ],
                                [
                                    "eng" => "Okpho",
                                    "mm" => "အုတ်ဖို"
                                ],
                                [
                                    "eng" => "Zigon",
                                    "mm" => "ဇီးကုန်း"
                                ],
                                [
                                    "eng" => "Nattalin",
                                    "mm" => "နတ်တလင်း"
                                ],
                                [
                                    "eng" => "Monyin",
                                    "mm" => "မိုးညို"
                                ],
                                [
                                    "eng" => "Gyobingauk",
                                    "mm" => "ကြို့ပင်ကောက်"
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    "eng" => "Yangon Region",
                    "mm" => "ရန်ကုန်တိုင်းဒေသကြီး",
                    "lat" => "16.8000",
                    "lng" => "96.1500",
                    "capital" => "Yangon",
                    "districts" => [
                        [
                            "eng" => "East Yangon",
                            "mm" => "ရန်ကုန်အရှေ့ပိုင်း",
                            "townships" => [
                                [
                                    "eng" => "Tamwe",
                                    "mm" => "တာမွေ"
                                ],
                                [
                                    "eng" => "South Okkalapa",
                                    "mm" => "တောင်ဥက္ကလာပ"
                                ],
                                [
                                    "eng" => "Dagon Seikkan",
                                    "mm" => "ဒဂုံမြို့သစ်-ဆိပ်ကမ်း"
                                ],
                                [
                                    "eng" => "South Dagon",
                                    "mm" => "ဒဂုံမြို့သစ်-တောင်ပိုင်း"
                                ],
                                [
                                    "eng" => "North Dagon",
                                    "mm" => "ဒဂုံမြို့သစ်-မြောက်ပိုင်း"
                                ],
                                [
                                    "eng" => "East Dagon",
                                    "mm" => "ဒဂုံမြို့သစ်-အရှေ့ပိုင်း"
                                ],
                                [
                                    "eng" => "Dawbon",
                                    "mm" => "ဒေါပုံ"
                                ],
                                [
                                    "eng" => "Pazundaung",
                                    "mm" => "ပုဇွန်တောင်"
                                ],
                                [
                                    "eng" => "Botataung",
                                    "mm" => "ဗိုလ်တထောင်"
                                ],
                                [
                                    "eng" => "Mingala Taungnyunt",
                                    "mm" => "မင်္ဂလာတောင်ညွန့်"
                                ],
                                [
                                    "eng" => "North Okkalapa",
                                    "mm" => "မြောက်ဥက္ကလာပ"
                                ],
                                [
                                    "eng" => "Yankin",
                                    "mm" => "ရန်ကင်း"
                                ],
                                [
                                    "eng" => "Thingangyun",
                                    "mm" => "သင်္ဃန်းကျွန်း"
                                ],
                                [
                                    "eng" => "Thaketa",
                                    "mm" => "သာကေတ"
                                ]
                            ]
                        ],
                        [
                            "eng" => "North Yangon",
                            "mm" => "ရန်ကုန်မြောက်ပိုင်း",
                            "townships" => [
                                [
                                    "eng" => "Taikkyi",
                                    "mm" => "တိုက်ကြီး"
                                ],
                                [
                                    "eng" => "Htantabin",
                                    "mm" => "ထန်းတပင်"
                                ],
                                [
                                    "eng" => "Mingaladon",
                                    "mm" => "မင်္ဂလာဒုံ"
                                ],
                                [
                                    "eng" => "Hmawbi",
                                    "mm" => "မှော်ဘီ"
                                ],
                                [
                                    "eng" => "Shwepyitha",
                                    "mm" => "ရွှေပြည်သာ"
                                ],
                                [
                                    "eng" => "Hlegu",
                                    "mm" => "လှည်းကူး"
                                ],
                                [
                                    "eng" => "Hlaingthaya",
                                    "mm" => "လှိုင်သာယာ"
                                ],
                                [
                                    "eng" => "Insein",
                                    "mm" => "အင်းစိန်"
                                ]
                            ]
                        ],
                        [
                            "eng" => "South Yangon",
                            "mm" => "ရန်ကုန်တောင်ပိုင်း",
                            "townships" => [
                                [
                                    "eng" => "Kyauktan",
                                    "mm" => "ကျောက်တန်း"
                                ],
                                [
                                    "eng" => "Kungyangon",
                                    "mm" => "ကွမ်းခြံကုန်း"
                                ],
                                [
                                    "eng" => "Cocokyun",
                                    "mm" => "ကိုကိုးကျွန်း"
                                ],
                                [
                                    "eng" => "Kawhmu",
                                    "mm" => "ကော့မှူး"
                                ],
                                [
                                    "eng" => "Kayan",
                                    "mm" => "ခရမ်း"
                                ],
                                [
                                    "eng" => "SeikkyiKanaungto",
                                    "mm" => "ဆိပ်ကြီးခနောင်တို"
                                ],
                                [
                                    "eng" => "Twante",
                                    "mm" => "တွံတေး"
                                ],
                                [
                                    "eng" => "Dala",
                                    "mm" => "ဒလ"
                                ],
                                [
                                    "eng" => "Thanlyin",
                                    "mm" => "သန်လျင်"
                                ],
                                [
                                    "eng" => "Thongwa",
                                    "mm" => "သုံးခွ"
                                ]
                            ]
                        ],
                        [
                            "eng" => "West Yangon",
                            "mm" => "ရန်ကုန်အနောက်ပိုင်း",
                            "townships" => [
                                [
                                    "eng" => "Kamayut",
                                    "mm" => "ကမာရွတ်"
                                ],
                                [
                                    "eng" => "Kyauktada",
                                    "mm" => "ကျောက်တံတား"
                                ],
                                [
                                    "eng" => "Kyimyindaing",
                                    "mm" => "ကြည့်မြင်တိုင်"
                                ],
                                [
                                    "eng" => "Sanchaung",
                                    "mm" => "စမ်းချောင်း"
                                ],
                                [
                                    "eng" => "Dagon",
                                    "mm" => "ဒဂုံ"
                                ],
                                [
                                    "eng" => "Pabedan",
                                    "mm" => "ပန်းဘဲတန်း"
                                ],
                                [
                                    "eng" => "Bahan",
                                    "mm" => "ဗဟန်း"
                                ],
                                [
                                    "eng" => "Mayangon",
                                    "mm" => "မရမ်းကုန်း"
                                ],
                                [
                                    "eng" => "Lanmadaw",
                                    "mm" => "လမ်းမတော်"
                                ],
                                [
                                    "eng" => "Latha",
                                    "mm" => "လသာ"
                                ],
                                [
                                    "eng" => "Hlaing",
                                    "mm" => "လှိုင်"
                                ],
                                [
                                    "eng" => "Ahlon",
                                    "mm" => "အလုံ"
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    "eng" => "Kachin State",
                    "mm" => "ကချင်ပြည်နယ်",
                    "lat" => "25.3867",
                    "lng" => "97.3936",
                    "capital" => "Myitkyina",
                    "districts" => [
                        [
                            "eng" => "Bhamo",
                            "mm" => "ဗန်းမော်",
                            "townships" => [
                                [
                                    "eng" => "Bhamo",
                                    "mm" => "ဗန်းမော်"
                                ],
                                [
                                    "eng" => "Mansi",
                                    "mm" => "မံစီ"
                                ],
                                [
                                    "eng" => "Shwegu",
                                    "mm" => "ရွှေကူ"
                                ],
                                [
                                    "eng" => "Myohla",
                                    "mm" => "မြို့လှ"
                                ],
                                [
                                    "eng" => "Momauk",
                                    "mm" => "မိုးမောက်"
                                ],
                                [
                                    "eng" => "Lwegel",
                                    "mm" => "လွယ်ဂျယ်"
                                ],
                                [
                                    "eng" => "Dotphoneyan",
                                    "mm" => "ဒေါ့ဖုန်းယန်"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Mohnyin",
                            "mm" => "မိုးညှင်း",
                            "townships" => [
                                [
                                    "eng" => "Mohnyin",
                                    "mm" => "မိုးညှင်း"
                                ],
                                [
                                    "eng" => "Hopin",
                                    "mm" => "ဟိုပင်"
                                ],
                                [
                                    "eng" => "Mogaung",
                                    "mm" => "မိုးကောင်း"
                                ],
                                [
                                    "eng" => "Hpakant",
                                    "mm" => "ဖားကန့်"
                                ],
                                [
                                    "eng" => "Kamine",
                                    "mm" => "ကာမိုင်း"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Myitkyina",
                            "mm" => "မြစ်ကြီးနား",
                            "townships" => [
                                [
                                    "eng" => "Myitkyina",
                                    "mm" => "မြစ်ကြီးနား"
                                ],
                                [
                                    "eng" => "Hsinbo",
                                    "mm" => "ဆင်ဘို"
                                ],
                                [
                                    "eng" => "Waingmaw",
                                    "mm" => "ဝိုင်းမော်"
                                ],
                                [
                                    "eng" => "Hsadone",
                                    "mm" => "ဆဒေါင်"
                                ],
                                [
                                    "eng" => "Kanpaikti",
                                    "mm" => "ကန်ပိုက်တီ"
                                ],
                                [
                                    "eng" => "Injangyang",
                                    "mm" => "အင်ဂျန်းယန်"
                                ],
                                [
                                    "eng" => "Tanai",
                                    "mm" => "တနိုင်း"
                                ],
                                [
                                    "eng" => "Shinbwayyan",
                                    "mm" => "ရှင်ဗွေယန်"
                                ],
                                [
                                    "eng" => "Chipwi",
                                    "mm" => "ချီဖွေ"
                                ],
                                [
                                    "eng" => "Panwa",
                                    "mm" => "ပန်ဝါ"
                                ],
                                [
                                    "eng" => "Hsawlaw",
                                    "mm" => "ဆော့လော်"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Putao",
                            "mm" => "ပူတာအို",
                            "townships" => [
                                [
                                    "eng" => "Putao",
                                    "mm" => "ပူတာအို"
                                ],
                                [
                                    "eng" => "Nogmung",
                                    "mm" => "နောင်မွန်း"
                                ],
                                [
                                    "eng" => "Pannandin",
                                    "mm" => "ပန်နန်းဒင်"
                                ],
                                [
                                    "eng" => "Sumprabum",
                                    "mm" => "ဆွမ်ပရာဘွမ်"
                                ],
                                [
                                    "eng" => "Kawnglanghpu",
                                    "mm" => "ခေါင်လန်ဖူး"
                                ],
                                [
                                    "eng" => "Machanbaw",
                                    "mm" => "မချမ်းဘော"
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    "eng" => "Rakhine State",
                    "mm" => "ရခိုင်ပြည်နယ်",
                    "lat" => "20.1444",
                    "lng" => "92.8969",
                    "capital" => "Sittwe",
                    "districts" => [
                        [
                            "eng" => "Kyaukpyu",
                            "mm" => "ကျောက်ဖြူ",
                            "townships" => [
                                [
                                    "eng" => "Kyaukpyu",
                                    "mm" => "ကျောက်ဖြူ"
                                ],
                                [
                                    "eng" => "Manaung",
                                    "mm" => "မာန်အောင်"
                                ],
                                [
                                    "eng" => "Ramree",
                                    "mm" => "ရမ်းဗြဲ"
                                ],
                                [
                                    "eng" => "Ann",
                                    "mm" => "အမ်း"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Maungdaw",
                            "mm" => "မောင်တော",
                            "townships" => [
                                [
                                    "eng" => "Maungdaw",
                                    "mm" => "မောင်တော"
                                ],
                                [
                                    "eng" => "Buthidaung",
                                    "mm" => "ဘူးသီးတောင်"
                                ],
                                [
                                    "eng" => "Taungpyoletwe",
                                    "mm" => "တောင်ပြိုလက်ဝဲ"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Sittwe",
                            "mm" => "စစ်တွေ",
                            "townships" => [
                                [
                                    "eng" => "Sittwe",
                                    "mm" => "စစ်တွေ"
                                ],
                                [
                                    "eng" => "Ponnagyun",
                                    "mm" => "ပုဏ္ဏားကျွန်း"
                                ],
                                [
                                    "eng" => "Pauktaw",
                                    "mm" => "ပေါက်တော"
                                ],
                                [
                                    "eng" => "Rathedaung",
                                    "mm" => "ရသေ့တောင်"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Thandwe",
                            "mm" => "သံတွဲ",
                            "townships" => [
                                [
                                    "eng" => "Thandwe",
                                    "mm" => "သံတွဲ"
                                ],
                                [
                                    "eng" => "Toungup",
                                    "mm" => "တောင်ကုတ်"
                                ],
                                [
                                    "eng" => "Gaw",
                                    "mm" => "ဂွ"
                                ],
                                [
                                    "eng" => "Kyeintali",
                                    "mm" => "ကျိန္တလီ"
                                ],
                                [
                                    "eng" => "Maei",
                                    "mm" => "မအီ"
                                ]
                            ]
                        ],
                        [
                            "eng" => "Mrauk-U",
                            "mm" => "မြောက်ဦး",
                            "townships" => [
                                [
                                    "eng" => "MraukU",
                                    "mm" => "မြောက်ဦး"
                                ],
                                [
                                    "eng" => "Kyauktaw",
                                    "mm" => "ကျောက်တော်"
                                ],
                                [
                                    "eng" => "Minbya",
                                    "mm" => "မင်းပြား"
                                ],
                                [
                                    "eng" => "Myebon",
                                    "mm" => "မြေပုံ"
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $subjectNames = ['Myanmar', 'English', 'Physics', 'Mathematics','Geography','Science','Biology', 'Chemistry'];

        foreach ($subjectNames as $key => $value) {
            // Create subjects
            $subjects = Subject::factory(1)->create(['name' => $value]);
        }

        // Create teachers
        $teachers = Teacher::factory(10)->create();

        // Attach random subjects and locations to each teacher
        foreach ($teachers as $teacher) {
            // Attach random subjects
            $teacher->subjects()->attach(rand(1,8));

            // Get a random region index
            $randomRegionIndex = array_rand($jayParsedAry['data']);

            // Get the data for the random region
            $regionData = $jayParsedAry['data'][$randomRegionIndex];

            $di1 = rand(0, 1);
            $di2 = rand(0, 1);
            $to1 = rand(0, 1);
            $to2 = rand(0, 1);

            // Create teacher location for the region
            $teacher->locations()->create([
                'region_state' => $regionData['eng'],
                'region_state_mm' => $regionData['mm'],
                'capital' => $regionData['capital'],
                'township' => $regionData['districts'][$di1]['townships'][$to1]['eng'],
                'township_mm' => $regionData['districts'][$di1]['townships'][$to1]['mm'],
            ]);

            // Create teacher location for the region
            $teacher->locations()->create([
                'region_state' => $regionData['eng'],
                'region_state_mm' => $regionData['mm'],
                'capital' => $regionData['capital'],
                'township' => $regionData['districts'][$di2]['townships'][$to2]['eng'],
                'township_mm' => $regionData['districts'][$di2]['townships'][$to2]['mm'],
            ]);
        }
    }
}
