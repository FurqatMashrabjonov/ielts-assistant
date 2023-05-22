<?php

namespace Database\Seeders;

use App\Models\Cambridge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CambridgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        //Cambridge File IDs

        $ids = [

                [  //1
                    'CQACAgIAAxkBAAP_ZGpHLyEwL41jz-4KkQUXXHNDpqAAAjQHAAKtZdFJg6pNvzyJlbQvBA',
                    'CQACAgIAAxkBAAIBAWRqR05_T_Kklw-yM81QXlSCegrtAAKgBQACzPrQSbV0LH_HQ-1LLwQ',
                    'CQACAgIAAxkBAAIBAmRqR062a2bzTtcMLn_h3nCLL_FaAAKhBQACzPrQSefXpZE0Bt9tLwQ',
                    'CQACAgIAAxkBAAIBA2RqR07hojy_dIyc2A6ZBWdnv2uoAAKiBQACzPrQSWfc8VSVgdFsLwQ'
                ],
                [  //2
                    'CQACAgIAAxkBAAIBCmRqR4OBzSp305h3ty46kf3vGUmjAAI4BwACrWXRSVXk3MLqh_oXLwQ',
                    'CQACAgIAAxkBAAIBB2RqR4MJDtp9_3cHXS24X9HqvBPEAAI1BwACrWXRSRbVzpinrbmULwQ',
                    'CQACAgIAAxkBAAIBCGRqR4PpAxQxN4sTAAElbdMJ5aFxoAACNgcAAq1l0UksfZvb_5ssmC8E',
                    'CQACAgIAAxkBAAIBCWRqR4M0e_K6_F0x-LyhRp7zCWTjAAI3BwACrWXRSXcBJ768HzskLwQ'
                ],
                [  //3
                    'CQACAgIAAxkBAAIBF2RqWSQ_r-Clj3yDmoeEmxXnToYvAALRJwAC2nt4S3VIjkRAVdPlLwQ',
                    'CQACAgIAAxkBAAIBZ2RqYS1bUCqt-bel21CdawKXLfC7AAL9MQACz-NRS1U1pl1Bu025LwQ',
                    'CQACAgIAAxkBAAIBa2RqYVZgeuvkfq-_EU-Gc9FolshAAAKALQAC2YlRS0jhuj1vmaG2LwQ',
                    'CQACAgIAAxkBAAIBY2RqYRI-02Si1xHKKlpmCMaC6ydvAAKLGAACyMlpSLKW26Z9-aj1LwQ'
                ],
                [  //4
                    'CQACAgIAAxkBAAIBD2RqWBUI368IaQABNUxNx7i3Dy1ZIwACvgUAAsz60ElvnWJhHyTERi8E',
                    'CQACAgIAAxkBAAIBEGRqWBVawXNNmtXBagz1M_vYDM4EAALABQACzPrQSXJ34zQxaz8qLwQ',
                    'CQACAgIAAxkBAAIBEWRqWBUUUR6XeW84Iu9cPrtwlFQHAALBBQACzPrQSff1R1IZTE2bLwQ',
                    'CQACAgIAAxkBAAIBEmRqWBX0o8Gwh3j57wcEmoX5z3RVAALCBQACzPrQSeZ7tUTL8GpNLwQ'
                ],
                [  //5
                    'CQACAgIAAxkBAAIBXWRqYGSTsf3vJEesydUpnzwQMXjQAAJULwAC9Q1QS1K_NDy4939xLwQ',
                    'CQACAgIAAxkBAAIBW2RqYFK_wEc05yGO5NBmCvoan7JtAAJSLwAC9Q1QS5Pjsr7LGouFLwQ',
                    'CQACAgIAAxkBAAIBYWRqYIfTmeCvDap7jtwKUWJtou-yAALiLgACx85RS7HlMHkttE5vLwQ',
                    'CQACAgIAAxkBAAIBX2RqYHiuJI97l-_hlplfn1heKNW2AAJHMwACvtFQS7VSeRnBtHPbLwQ'
                ],
                [  //6
                    'CQACAgIAAxkBAAIBUWRqX209W6mYgNEkaWSzUrvBNyd_AAJnLQAC2YlRSywGWW4TvQaLLwQ',
                    'CQACAgIAAxkBAAIBV2RqX-FaEBfaXfrPdZFBBkbm_MyaAAKuMQACIWVQS2yI7DlgEm9GLwQ',
                    'CQACAgIAAxkBAAIBU2RqX5eDs-MOPFtrBkvmYgryEDrIAALqKgAC4QT5SO91fwVWmcMuLwQ',
                    'CQACAgIAAxkBAAIBVWRqX8k4CGcgcbb9wWtJF16PicWSAAKmMgACDftYS3yaWMjB59x-LwQ'
                ],
                [  //7
                    'CQACAgIAAxkBAAIBPWRqXjQvaGoiuOSrPvoMmeBwWnkKAAKdLgACx85RSwcQ55Mhu42xLwQ',
                    'CQACAgIAAxkBAAIBO2RqXiQc61VFwXX6-ZeA1w5HeIsWAAIQKwACwiNYSzXqou5dSlDkLwQ',
                    'CQACAgIAAxkBAAIBM2RqXdEnegq-sFaOTcRBzPDTFvuMAAIyLwACr4dRSwKDnt77cdBYLwQ',
                    'CQACAgIAAxkBAAIBNWRqXe3Ry3cKf-lKyHBCER762UukAAIrMwACvtFQSz9L-vdV6r7ULwQ'
                ],
                [  //8
                    'CQACAgIAAxkBAAIBQmRqXm4O0zzoBA66dd8o-wQKpZFWAAKVMQACIWVQSxDz4WZkxxyULwQ',
                    'CQACAgIAAxkBAAIBQWRqXm70SuhLw5DoBbbtQi5HhEqEAAIKKwACwiNYS3E6nY9J0np8LwQ',
                    'CQACAgIAAxkBAAIBQ2RqXm7y4yoPVGIPc5iP3EBejRrwAAIMKwACwiNYS9Lp894KuFB8LwQ',
                    'CQACAgIAAxkBAAIBRGRqXm4q78fsyC7urxFVFkU44pL3AAINKwACwiNYSwn3Qefhv1WwLwQ'
                ],
                [  //9
                    'CQACAgIAAxkBAAIBTGRqXqtIAi9s-f3qnuujh84jF66xAALfNAACH6RRSxVtCRcAAfS94y8E',
                    'CQACAgIAAxkBAAIBSWRqXqtAZAHwZJVwS3yRpkInlAUEAAK1MQACz-NRS2PR4ykD3-BJLwQ',
                    'CQACAgIAAxkBAAIBSmRqXquxM_PIaLK7ZnuYltiSsNY8AAIhMwACvtFQS51GMJ-TWuB6LwQ',
                    'CQACAgIAAxkBAAIBS2RqXqvqjbnUKsMfjJsEOAABgAiAMQACly4AAsfOUUvf61VPeMS02y8E'
                ],
                [  //10
                    'CQACAgIAAxkBAAIBG2RqWyRhQtk7aXVF8xtLcTpFFw1BAAJELQAC2YlRS1NdtVetUZ4ILwQ',
                    'CQACAgIAAxkBAAIBGWRqWw4wRgimZ_oMr3f1d_q6kR24AAIPLwACgMhZSwkd6P9KmDFfLwQ',
                    'CQACAgIAAxkBAAIBHmRqW2fQLHZ6EVFz2eDb9FvQBwNDAAKCLgACx85RS9AxJD2QsCFaLwQ',
                    'CQACAgIAAxkBAAIBIGRqW3i-18XeU5Y9Ybbp8mm-6M1TAAIaLwACgMhZS6P_vpm77n_fLwQ'
                ],
                [  //11
                    'CQACAgIAAxkBAAIBKWRqXEvXg9gjE3-XLLQg3Y3F05n5AAJYMgACDftYS8VE8ctzj4aGLwQ',
                    'CQACAgIAAxkBAAIBJWRqW_qrMVHFSRwpwrZPTCC0Fh2NAAL_KgACwiNYS5jK0wlLn7rkLwQ',
                    'CQACAgIAAxkBAAIBI2RqW9d-SqBrQ8T-x15V_e85Ke-pAAIeLwACgMhZS72envwCgv7-LwQ',
                    'CQACAgIAAxkBAAIBJ2RqXDRWflsG5DOx_wR1OHNtng-eAAKKLgACyMUxS3t34iOX2u8tLwQ'
                ],
                [  //12
                    'CQACAgIAAxkBAAIBL2RqXMLGlmJ3OP7R75T_6To0ybiFAAIaMwACvtFQS0CXwc4YarGcLwQ',
                    'CQACAgIAAxkBAAIBMWRqXQT0Kfc0HjvfMRl7ERRrsjoSAAKvMQACz-NRS4yqzd9MSLLqLwQ',
                    'CQACAgIAAxkBAAIBK2RqXJigqI2ENm5qrlMmsXIQXOHFAALQNQACv6lRSwPkDFwXHP29LwQ',
                    'CQACAgIAAxkBAAIBLWRqXKluiSOUP-QRnUHH21S0tWKzAAIZMwACvtFQS5l_OXQcKFaxLwQ'
                ],
                [  //13
                    'CQACAgIAAxkBAAP4ZGpF2CpjoPlcEsHjLfTIrfWz7XwAAn0tAAL1DVBLYqPWAtiXRQQvBA',
                    'CQACAgIAAxkBAAP0ZGpFpsPATnXHc9PBkxN54kkwdScAAvgwAAIN-1hLLpbisvCcdCovBA',
                    'CQACAgIAAxkBAAP2ZGpFx9-ReDl4imImx0MkQ7QCGRsAAo0nAAKrnahLU8WhYukJOGMvBA',
                    'CQACAgIAAxkBAAP6ZGpF52kVKGTnAvtelT13JuhjqoMAAtglAAJ006lLm1Hrg2GpmE4vBA'
                ],
                [  //14
                    'CQACAgIAAxkBAAPsZGpEkKdpBrsS9pX0EgN2lqm4f20AAlYtAAI4hXhJmK9ifpVNKnQvBA',
                    'CQACAgIAAxkBAAPuZGpEvj81KPGwDOSoZwL2m9i5i3sAAmUrAAIhTVFKvVBgTkyEqWcvBA',
                    'CQACAgIAAxkBAAPwZGpE1Duk4MkjqUPjfIDX5u94reAAAjgkAAJYROhIa8iyrtVy13IvBA',
                    'CQACAgIAAxkBAAPyZGpE5FlYTgdgLUj7iGPlIvnQpX8AAmIoAALZiVFLLh4lW8scTWovBA'
                ],
                [  //15
                    'CQACAgIAAxkBAAPjZGpD2hFMW_zO2SxwY_rRU1Omet0AArYsAAIhZVBL73y0Zs5076MvBA',
                    'CQACAgIAAxkBAAPlZGpD7ZJvTnndDFTUJVfQiyntHdwAAkouAAK-0VBLRrubyQKXctIvBA',
                    'CQACAgIAAxkBAAPnZGpEWnXuWwlEOWA45ZWkOnkYmH8AAvkpAAL1DVBLWsunNyOw8qIvBA',
                    'CQACAgIAAxkBAAPqZGpEd7aUnGehC9-yMR_4s78toGEAAmwqAALHzlFLFrSjj0WYnDYvBA'
                ],
                [   //16
                    'CQACAgIAAxkBAAPbZGpDSSO1LggPPNqCcsudSrRZgPwAAqAsAALP41FLY9WZw2yfA2gvBA',
                    'CQACAgIAAxkBAAPdZGpDar3XRWqgcvhtdG7Sdlc_3UcAAksoAALZiVFLFp7csl5iWC8vBA',
                    'CQACAgIAAxkBAAPfZGpDft1hasKf21QoxkySAAEFfWFSAAJTMQAChsaBSba_OUORvvOHLwQ',
                    'CQACAgIAAxkBAAPhZGpDjJQTpCCElSsB6yxKTW3pBSwAAoAvAAIfpFFLOlE_iBeMpRMvBA'
                ],
                [  //17
                    'CQACAgIAAxkBAAPIZGpBlPT0FEbIkn3-nP4eTT9WkWYAAmU0AALH1nlJnKTwFb-7Jr0vBA',
                    'CQACAgIAAxkBAAPKZGpBvQVmvKAYFqieF1k4Wi5opl0AAkUqAALHzlFLRlkeYArcbeIvBA',
                    'CQACAgIAAxkBAAPXZGpDIwWs1AOBO_oPU1CnQz0by5oAAhYqAAKvh1FLzRplgTHZqZwvBA',
                    'CQACAgIAAxkBAAPZZGpDMncJBOf2BW5X_NkfHtUJ0qgAAhsuAAK-0VBL39c3jmhjqAwvBA'
                ]

        ];

        $i = 1;
        $j = 1;

        foreach ($ids as $id) {
            $j = 1;
            foreach ($id as $file_id) {
                $data[] = [
                    'name' => 'Cambridge ' . $i . ' Test ' . $j . ' 💽',
                    'key' => 'Cam ' . $i . ' ' . $j,
                    'audio_file_id' => $ids[$i - 1][$j - 1],
//                    'pdf_file_id' => ''
                ];
                $j++;
            }
            $i++;
        }

        Cambridge::query()->insert($data);
    }
}
