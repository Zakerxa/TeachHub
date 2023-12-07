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
                ]
            ]
        ];

        $subjectNames = ['Myanmar', 'English', 'Physics', 'Mathematics', 'Geography', 'Science', 'Biology', 'Chemistry'];
        $subjectNames_mm = ['မြန်မာ','အင်္ဂလိပ်','ရူပဗေဒ','သင်္ချာ','ပထဝီ','သိပ္ပံ','ဇီဝဗေဒ','ဓာတုဗေဒ'];

        foreach ($subjectNames as $key => $value) {
            // Create subjects
            Subject::factory(1)->create(['name' => $value,'name_mm' => $subjectNames_mm[$key]]);
        }

        // Create teachers
        $teachers = Teacher::factory(24)->create();

        // Attach random subjects and locations to each teacher
        foreach ($teachers as $teacher) {
            // Attach random subjects
            $teacher->subjects()->attach(rand(1, 8));

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
