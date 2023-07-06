<?php

namespace App;

class Region
{

    // Tạo danh sách chức năng định tuyến để gọi khi tạo trang trong admin -> người dùng có thể tùy chọn
    const DATA = [
        [
            "id" => 3,
            "name" => "TP. Hồ Chí Minh",
            "district" => [
                [
                    "id" => 822,
                    "name" => "Quận 1",
                ],
                [
                    "id" => 799,
                    "name" => "Quận 2",
                ],
                [
                    "id" => 800,
                    "name" => "Quận 3",
                ],
                [
                    "id" => 801,
                    "name" => "Quận 4",
                ],
                [
                    "id" => 802,
                    "name" => "Quận 5",
                ],
                [
                    "id" => 803,
                    "name" => "Quận 6",
                ],
                [
                    "id" => 804,
                    "name" => "Quận 7",
                ],
                [
                    "id" => 805,
                    "name" => "Quận 8",
                ],
                [
                    "id" => 806,
                    "name" => "Quận 9",
                ],
                [
                    "id" => 807,
                    "name" => "Quận 10",
                ],
                [
                    "id" => 808,
                    "name" => "Quận 11",
                ],
                [
                    "id" => 809,
                    "name" => "Quận 12",
                ],
                [
                    "id" => 813,
                    "name" => "Quận Bình Tân",
                ],
                [
                    "id" => 819,
                    "name" => "Quận Bình Thạnh",
                ],
                [
                    "id" => 811,
                    "name" => "Quận Gò Vấp",
                ],
                [
                    "id" => 820,
                    "name" => "Quận Phú Nhuận",
                ],
                [
                    "id" => 812,
                    "name" => "Quận Tân Bình",
                ],
                [
                    "id" => 815,
                    "name" => "Quận Tân Phú",
                ],
                [
                    "id" => 810,
                    "name" => "Quận Thủ Đức",
                ],
                [
                    "id" => 818,
                    "name" => "Huyện Bình Chánh",
                ],
                [
                    "id" => 821,
                    "name" => "Huyện Cần Giờ",
                ],
                [
                    "id" => 816,
                    "name" => "Huyện Củ Chi",
                ],
                [
                    "id" => 814,
                    "name" => "Huyện Hóc Môn",
                ],
                [
                    "id" => 817,
                    "name" => "Huyện Nhà Bè",
                ],
            ],
            "order" => 1,
        ],
        [
            "id" => 5,
            "name" => "Hà Nội",
            "district" => [
                [
                    "id" => 824,
                    "name" => "Quận Ba Đình",
                ],
                [
                    "id" => 825,
                    "name" => "Quận Cầu Giấy",
                ],
                [
                    "id" => 823,
                    "name" => "Quận Đống Đa",
                ],
                [
                    "id" => 840,
                    "name" => "Quận Hà Đông",
                ],
                [
                    "id" => 826,
                    "name" => "Quận Hai Bà Trưng",
                ],
                [
                    "id" => 827,
                    "name" => "Quận Hoàn Kiếm",
                ],
                [
                    "id" => 828,
                    "name" => "Quận Hoàng Mai",
                ],
                [
                    "id" => 829,
                    "name" => "Quận Long Biên",
                ],
                [
                    "id" => 830,
                    "name" => "Quận Tây Hồ",
                ],
                [
                    "id" => 831,
                    "name" => "Quận Thanh Xuân",
                ],
                [
                    "id" => 914,
                    "name" => "Quận Nam Từ Liêm",
                ],
                [
                    "id" => 916,
                    "name" => "Quận Bắc Từ Liêm",
                ],
                [
                    "id" => 837,
                    "name" => "Huyện Ba Vì",
                ],
                [
                    "id" => 838,
                    "name" => "Huyện Chương Mỹ",
                ],
                [
                    "id" => 839,
                    "name" => "Huyện Đan Phượng",
                ],
                [
                    "id" => 832,
                    "name" => "Huyện Đông Anh",
                ],
                [
                    "id" => 833,
                    "name" => "Huyện Gia Lâm",
                ],
                [
                    "id" => 841,
                    "name" => "Huyện Hoài Đức",
                ],
                [
                    "id" => 842,
                    "name" => "Huyện Mê Linh",
                ],
                [
                    "id" => 843,
                    "name" => "Huyện Mỹ Đức",
                ],
                [
                    "id" => 844,
                    "name" => "Huyện Phú Xuyên",
                ],
                [
                    "id" => 845,
                    "name" => "Huyện Phúc Thọ",
                ],
                [
                    "id" => 846,
                    "name" => "Huyện Quốc Oai",
                ],
                [
                    "id" => 834,
                    "name" => "Huyện Sóc Sơn",
                ],
                [
                    "id" => 848,
                    "name" => "Huyện Thạch Thất",
                ],
                [
                    "id" => 849,
                    "name" => "Huyện Thanh Oai",
                ],
                [
                    "id" => 835,
                    "name" => "Huyện Thanh Trì",
                ],
                [
                    "id" => 850,
                    "name" => "Huyện Thường Tín",
                ],
                [
                    "id" => 836,
                    "name" => "Huyện Từ Liêm (xóa)",
                ],
                [
                    "id" => 851,
                    "name" => "Huyện Ứng Hòa",
                ],
                [
                    "id" => 847,
                    "name" => "Thị xã Sơn Tây",
                ],

            ],
            "order" => 2,
        ],
        [
            "id" => 9,
            "name" => "Đà Nẵng",
            "district" => [
                [
                    "id" => 889,
                    "name" => "Quận Cẩm Lệ",
                ],
                [
                    "id" => 890,
                    "name" => "Quận Hải Châu",
                ],
                [
                    "id" => 893,
                    "name" => "Quận Liên Chiểu",
                ],
                [
                    "id" => 894,
                    "name" => "Quận Ngũ Hành Sơn",
                ],
                [
                    "id" => 895,
                    "name" => "Quận Sơn Trà",
                ],
                [
                    "id" => 888,
                    "name" => "Quận Thanh Khê",
                ],
                [
                    "id" => 891,
                    "name" => "Huyện Hoà Vang",
                ],
                [
                    "id" => 892,
                    "name" => "Huyện đảo Hoàng Sa",
                ],
            ],
            "order" => 3,
        ],
        [
            "id" => 7,
            "name" => "Cần Thơ",
            "district" => [
                [
                    "id" => 870,
                    "name" => "Quận Bình Thủy",
                ],
                [
                    "id" => 871,
                    "name" => "Quận Cái Răng",
                ],
                [
                    "id" => 869,
                    "name" => "Quận Ninh Kiều",
                ],
                [
                    "id" => 872,
                    "name" => "Quận Ô Môn",
                ],
                [
                    "id" => 868,
                    "name" => "Quận Thốt Nốt",
                ],
                [
                    "id" => 874,
                    "name" => "Huyện Cờ Đỏ",
                ],
                [
                    "id" => 873,
                    "name" => "Huyện Phong Điền",
                ],
                [
                    "id" => 876,
                    "name" => "Huyện Thới Lai",
                ],
                [
                    "id" => 875,
                    "name" => "Huyện Vĩnh Thạnh",
                ],
            ],
            "order" => 4,
        ],
        [
            "id" => 101,
            "name" => "Hải Phòng",
            "district" => [
                [
                    "id" => 228,
                    "name" => "Quận Đồ Sơn",
                ],
                [
                    "id" => 227,
                    "name" => "Quận Dương Kinh",
                ],
                [
                    "id" => 229,
                    "name" => "Quận Hải An",
                ],
                [
                    "id" => 230,
                    "name" => "Quận Hồng Bàng",
                ],
                [
                    "id" => 231,
                    "name" => "Quận Kiến An",
                ],
                [
                    "id" => 233,
                    "name" => "Quận Lê Chân",
                ],
                [
                    "id" => 234,
                    "name" => "Quận Ngô Quyền",
                ],
                [
                    "id" => 223,
                    "name" => "Huyện An Dương",
                ],
                [
                    "id" => 224,
                    "name" => "Huyện An Lão",
                ],
                [
                    "id" => 225,
                    "name" => "Huyện đảo Bạch Long Vĩ",
                ],
                [
                    "id" => 226,
                    "name" => "Huyện đảo Cát Hải",
                ],
                [
                    "id" => 232,
                    "name" => "Huyện Kiến Thụy",
                ],
                [
                    "id" => 235,
                    "name" => "Huyện Thuỷ Nguyên",
                ],
                [
                    "id" => 236,
                    "name" => "Huyện Tiên Lãng",
                ],
                [
                    "id" => 237,
                    "name" => "Huyện Vĩnh Bảo",
                ],
            ],
            "order" => 5,
        ],
        [
            "id" => 125,
            "name" => "Khánh Hoà",
            "district" => [
                [
                    "id" => 452,
                    "name" => "Thành phố Nha Trang",
                ],
                [
                    "id" => 450,
                    "name" => "Thành phố Cam Ranh",
                ],
                [
                    "id" => 457,
                    "name" => "Huyện Cam Lâm",
                ],
                [
                    "id" => 453,
                    "name" => "Huyện đảo Trường Sa",
                ],
                [
                    "id" => 451,
                    "name" => "Huyện Diên Khánh",
                ],
                [
                    "id" => 456,
                    "name" => "Huyện Khánh Sơn",
                ],
                [
                    "id" => 455,
                    "name" => "Huyện Khánh Vĩnh",
                ],
                [
                    "id" => 458,
                    "name" => "Huyện Ninh Hòa",
                ],
                [
                    "id" => 454,
                    "name" => "Huyện Vạn Ninh",
                ],

            ],
            "order" => 6,
        ],
        [
            "id" => 102,
            "name" => "Bà Rịa - Vũng Tàu",
            "district" => [
                [
                    "id" => 238,
                    "name" => "Thành phố Bà Rịa",
                ],
                [
                    "id" => 244,
                    "name" => "Thành phố Vũng Tàu",
                ],
                [
                    "id" => 239,
                    "name" => "Huyện Châu Đức",
                ],
                [
                    "id" => 240,
                    "name" => "Huyện Côn Đảo",
                ],
                [
                    "id" => 241,
                    "name" => "Huyện Đất Đỏ",
                ],
                [
                    "id" => 242,
                    "name" => "Huyện Long Điền",
                ],
                [
                    "id" => 243,
                    "name" => "Huyện Tân Thành",
                ],
                [
                    "id" => 245,
                    "name" => "Huyện Xuyên Mộc",
                ],

            ],
            "order" => 7,
        ],
        [
            "id" => 109,
            "name" => "Bình Dương",
            "district" => [
                [
                    "id" => 298,
                    "name" => "Thành phố Thủ Dầu Một",
                ],
                [
                    "id" => 917,
                    "name" => "Huyện Bắc Tân Uyên",
                ],
                [
                    "id" => 910,
                    "name" => "Huyện Bàu Bàng",
                ],
                [
                    "id" => 300,
                    "name" => "Huyện Dầu Tiếng",
                ],
                [
                    "id" => 302,
                    "name" => "Huyện Phú Giáo",
                ],
                [
                    "id" => 299,
                    "name" => "Thị xã Bến Cát",
                ],
                [
                    "id" => 301,
                    "name" => "Thị xã Dĩ An",
                ],
                [
                    "id" => 303,
                    "name" => "Thị xã Tân Uyên",
                ],
                [
                    "id" => 304,
                    "name" => "Thị xã Thuận An",
                ],
            ],
            "order" => 8,
        ],
        [
            "id" => 82,
            "name" => "An Giang",
            "district" => [
                [
                    "id" => 220,
                    "name" => "Thành phố Long Xuyên",
                ],
                [
                    "id" => 219,
                    "name" => "Thành phố Châu Đốc",
                ],
                [
                    "id" => 218,
                    "name" => "Huyện An Phú",
                ],
                [
                    "id" => 221,
                    "name" => "Huyện Châu Phú",
                ],
                [
                    "id" => 212,
                    "name" => "Huyện Châu Thành",
                ],
                [
                    "id" =>    213,
                    "name" => "Huyện Chợ Mới",
                ],
                [
                    "id" => 217,
                    "name" => "Huyện Phú Tân",
                ],
                [
                    "id" => 216,
                    "name" => "Huyện Thoại Sơn",
                ],
                [
                    "id" => 215,
                    "name" => "Huyện Tịnh Biên",
                ],
                [
                    "id" => 214,
                    "name" => "Huyện Tri Tôn",
                ],
                [
                    "id" => 222,
                    "name" => "Thị xã Tân Châu",
                ],
            ],
            "order" => 9,
        ],
        [
            "id" => 105,
            "name" => "Bạc Liêu",
            "district" => [
                [
                    "id" => 263,
                    "name" => "Thành phố Bạc Liêu",
                ],
                [
                    "id" => 264,
                    "name" => "Huyện Đông Hải",
                ],
                [
                    "id" => 265,
                    "name" => "Huyện Giá Rai",
                ],
                [
                    "id" => 266,
                    "name" => "Huyện Hoà Bình",
                ],
                [
                    "id" => 267,
                    "name" => "Huyện Hồng Dân",
                ],
                [
                    "id" => 268,
                    "name" => "Huyện Phước Long",
                ],
                [
                    "id" => 269,
                    "name" => "Huyện Vĩnh Lợi",
                ],
            ],
            "order" => 10,
        ],
        [
            "id" => 103,
            "name" => "Bắc Giang",
            "district" => [
                [
                    "id" => 246,
                    "name" => "Thành phố Bắc Giang",
                ],
                [
                    "id" => 247,
                    "name" => "Huyện Hiệp Hòa",
                ],
                [
                    "id" => 248,
                    "name" => "Huyện Lạng Giang",
                ],
                [
                    "id" => 249,
                    "name" => "Huyện Lục Nam",
                ],
                [
                    "id" => 250,
                    "name" => "Huyện Lục Ngạn",
                ],
                [
                    "id" => 251,
                    "name" => "Huyện Sơn Động",
                ],
                [
                    "id" => 252,
                    "name" => "Huyện Việt Yên",
                ],
                [
                    "id" => 253,
                    "name" => "Huyện Yên Dũng",
                ],
                [
                    "id" => 254,
                    "name" => "Huyện Yên Thế",
                ],
                [
                    "id" => 901,
                    "name" => "Huyện Tân Yên",
                ],
            ],
            "order" => 11,
        ],
        [
            "id" => 104,
            "name" => "Bắc Kạn",
            "district" => [
                [
                    "id" => 256,
                    "name" => "Thành phố Bắc Kạn",
                ],
                [
                    "id" => 255,
                    "name" => "Huyện Ba Bể",
                ],
                [
                    "id" => 257,
                    "name" => "Huyện Bạch Thông",
                ],
                [
                    "id" => 258,
                    "name" => "Huyện Chợ Đồn",
                ],
                [
                    "id" => 259,
                    "name" => "Huyện Chợ Mới",
                ],
                [
                    "id" => 260,
                    "name" => "Huyện Na Rì",
                ],
                [
                    "id" => 261,
                    "name" => "Huyện Ngân Sơn",
                ],
                [
                    "id" => 262,
                    "name" => "Huyện Pác Nặm",
                ],
            ],
            "order" => 12,
        ],
        [
            "id" => 106,
            "name" => "Bắc Ninh",
            "district" => [
                [
                    "id" => 270,
                    "name" => "Thành phố Bắc Ninh",
                ],
                [
                    "id" => 271,
                    "name" => "Huyện Gia Bình",
                ],
                [
                    "id" => 272,
                    "name" => "Huyện Lương Tài",
                ],
                [
                    "id" => 273,
                    "name" => "Huyện Quế Võ",
                ],
                [
                    "id" => 274,
                    "name" => "Huyện Thuận Thành",
                ],
                [
                    "id" => 275,
                    "name" => "Huyện Tiên Du",
                ],
                [
                    "id" => 277,
                    "name" => "Huyện Yên Phong",
                ],
                [
                    "id" => 276,
                    "name" => "Thị xã Từ Sơn",
                ],
            ],
            "order" => 13,
        ],
        [
            "id" => 107,
            "name" => "Bến Tre",
            "district" => [
                [
                    "id" => 285,
                    "name" => "Thành phố Bến Tre",
                ],
                [
                    "id" => 284,
                    "name" => "Huyện Ba Tri",
                ],
                [
                    "id" => 278,
                    "name" => "Huyện Bình Đại",
                ],
                [
                    "id" => 279,
                    "name" => "Huyện Châu Thành",
                ],
                [
                    "id" => 280,
                    "name" => "Huyện Chợ Lách",
                ],
                [
                    "id" => 286,
                    "name" => "Huyện Giồng Trôm",
                ],
                [
                    "id" => 281,
                    "name" => "Huyện Mỏ Cày Bắc",
                ],
                [
                    "id" => 282,
                    "name" => "Huyện Mỏ Cày Nam",
                ],
                [
                    "id" => 909,
                    "name" => "Huyện Thạnh Phú",
                ],
            ],
            "order" => 14,
        ],
        [
            "id" => 108,
            "name" => "Bình Định",
            "district" => [
                [
                    "id" => 293,
                    "name" => "Thành phố Qui Nhơn",
                ],
                [
                    "id" => 287,
                    "name" => "Huyện An Lão",
                ],
                [
                    "id" => 289,
                    "name" => "Huyện Hoài Ân",
                ],
                [
                    "id" => 290,
                    "name" => "Huyện Hoài Nhơn",
                ],
                [
                    "id" => 291,
                    "name" => "Huyện Phù Cát",
                ],
                [
                    "id" => 292,
                    "name" => "Huyện Phù Mỹ",
                ],
                [
                    "id" => 294,
                    "name" => "Huyện Tây Sơn",
                ],
                [
                    "id" => 295,
                    "name" => "Huyện Tuy Phước",
                ],
                [
                    "id" => 296,
                    "name" => "Huyện Vân Canh",
                ],
                [
                    "id" => 297,
                    "name" => "Huyện Vĩnh Thạnh",
                ],
                [
                    "id" => 288,
                    "name" => "Thị xã An Nhơn",
                ],
            ],
            "order" => 15,
        ],
        [
            "id" => 110,
            "name" => "Bình Phước",
            "district" => [
                [
                    "id" => 306,
                    "name" => "Huyện Bù Đăng",
                ],
                [
                    "id" => 307,
                    "name" => "Huyện Bù Đốp",
                ],
                [
                    "id" => 896,
                    "name" => "Huyện Bù Gia Mập",
                ],
                [
                    "id" => 308,
                    "name" => "Huyện Chơn Thành",
                ],
                [
                    "id" => 309,
                    "name" => "Huyện Đồng Phú",
                ],
                [
                    "id" => 311,
                    "name" => "Huyện Lộc Ninh",
                ],
                [
                    "id" => 898,
                    "name" => "Huyện Hớn Quảng",
                ],
                [
                    "id" => 305,
                    "name" => "Thị xã Bình Long",
                ],
                [
                    "id" => 310,
                    "name" => "	Thị xã Đồng Xoài",
                ],
                [
                    "id" => 312,
                    "name" => "Thị xã Phước Long",
                ],
                [
                    "id" => 12304,
                    "name" => "Huyện Phú Riềng",
                ],
            ],
            "order" => 16,
        ],
        [
            "id" => 111,
            "name" => "Bình Thuận",
            "district" => [
                [
                    "id" => 319,
                    "name" => "Thành phố Phan Thiết",
                ],
                [
                    "id" => 313,
                    "name" => "Huyện Bắc Bình",
                ],
                [
                    "id" => 314,
                    "name" => "Huyện Đức Linh",
                ],
                [
                    "id" => 315,
                    "name" => "Huyện Hàm Tân",
                ],
                [
                    "id" => 316,
                    "name" => "	Huyện Hàm Thuận Bắc",
                ],
                [
                    "id" => 317,
                    "name" => "Huyện Hàm Thuận Nam",
                ],
                [
                    "id" => 320,
                    "name" => "Huyện Phú Quý",
                ],
                [
                    "id" => 321,
                    "name" => "Huyện Tánh Linh",
                ],
                [
                    "id" => 322,
                    "name" => "Huyện Tuy Phong",
                ],
                [
                    "id" => 318,
                    "name" => "	Thị xã La Gi",
                ],
            ],
            "order" => 17,
        ],
        [
            "id" => 81,
            "name" => "Cà Mau",
            "district" => [
                [
                    "id" => 210,
                    "name" => "Thành phố Cà Mau",
                ],
                [
                    "id" => 211,
                    "name" => "Huyện Cái Nước",
                ],
                [
                    "id" => 205,
                    "name" => "Huyện Đầm Dơi",
                ],
                [
                    "id" => 203,
                    "name" => "Huyện Năm căn",
                ],
                [
                    "id" => 202,
                    "name" => "Huyện Ngọc Hiển",
                ],
                [
                    "id" => 207,
                    "name" => "Huyện Phú Tân",
                ],
                [
                    "id" => 206,
                    "name" => "Huyện Thới Bình",
                ],
                [
                    "id" => 208,
                    "name" => "Huyện Trần Văn Thời",
                ],
                [
                    "id" => 204,
                    "name" => "Huyện U Minh",
                ],
            ],
            "order" => 18,
        ],
        [
            "id" => 112,
            "name" => "Cao Bằng",
            "district" => [
                [
                    "id" => 325,
                    "name" => "Thành phố Cao Bằng",
                ],
                [
                    "id" => 323,
                    "name" => "Huyện Bảo Lạc",
                ],
                [
                    "id" => 324,
                    "name" => "Huyện Bảo Lâm",
                ],
                [
                    "id" => 327,
                    "name" => "Huyện Hạ Lang",
                ],
                [
                    "id" => 326,
                    "name" => "Huyện Hà Quảng",
                ],
                [
                    "id" => 328,
                    "name" => "Huyện Hòa An",
                ],
                [
                    "id" => 329,
                    "name" => "Huyện Nguyên Bình",
                ],
                [
                    "id" => 330,
                    "name" => "Huyện Phục Hòa",
                ],
                [
                    "id" => 331,
                    "name" => "Huyện Quảng Uyên",
                ],
                [
                    "id" => 332,
                    "name" => "Huyện Thạch An",
                ],
                [
                    "id" => 333,
                    "name" => "Huyện Thông Nông",
                ],
                [
                    "id" => 334,
                    "name" => "Huyện Trà Lĩnh",
                ],
                [
                    "id" => 335,
                    "name" => "Huyện Trùng Khánh",
                ],
            ],
            "order" => 19,
        ],
        [
            "id" => 6,
            "name" => "Đắk Lắk",
            "district" => [
                [
                    "id" => 853,
                    "name" => "Thành phố Buôn Mê Thuột",
                ],
                [
                    "id" => 854,
                    "name" => "Huyện Buôn Đôn",
                ],
                [
                    "id" => 856,
                    "name" => "Huyện Cư Kuin",
                ],
                [
                    "id" => 857,
                    "name" => "Huyện Cư M'gar",
                ],
                [
                    "id" => 858,
                    "name" => "Huyện Ea H'leo",
                ],
                [
                    "id" => 859,
                    "name" => "Huyện Ea Kar",
                ],
                [
                    "id" => 860,
                    "name" => "Huyện Ea Súp",
                ],
                [
                    "id" => 861,
                    "name" => "Huyện Krông Ana",
                ],
                [
                    "id" => 862,
                    "name" => "Huyện Krông Bông",
                ],
                [
                    "id" => 863,
                    "name" => "Huyện Krông Búk",
                ],
                [
                    "id" => 864,
                    "name" => "Huyện Krông Năng",
                ],
                [
                    "id" => 865,
                    "name" => "Huyện Krông Pắk",
                ],
                [
                    "id" => 866,
                    "name" => "Huyện Lăk",
                ],
                [
                    "id" => 867,
                    "name" => "Huyện M'Đrăk",
                ],
                [
                    "id" => 855,
                    "name" => "Thị xã Buôn Hồ",
                ],
            ],
            "order" => 20,
        ],
        [
            "id" => 113,
            "name" => "Đắc Nông",
            "district" => [
                [
                    "id" => 343,
                    "name" => "Huyện Cư Jút",
                ],
                [
                    "id" => 336,
                    "name" => "Huyện Đăk Glong",
                ],
                [
                    "id" => 337,
                    "name" => "Huyện Đăk Mil",
                ],
                [
                    "id" => 338,
                    "name" => "Huyện Đăk R'Lấp",
                ],
                [
                    "id" => 339,
                    "name" => "Huyện Đăk Song",
                ],
                [
                    "id" => 341,
                    "name" => "Huyện Krông Nô",
                ],
                [
                    "id" => 342,
                    "name" => "Huyện Tuy Đức",
                ],
                [
                    "id" => 340,
                    "name" => "Thị xã Gia Nghĩa",
                ],
            ],
            "order" => 21,
        ],
        [
            "id" => 114,
            "name" => "Điện Biên",
            "district" => [
                [
                    "id" => 344,
                    "name" => "Huyện Điện Biên",
                ],
                [
                    "id" => 346,
                    "name" => "Thành phố Điện Biên Phủ",
                ],
                [
                    "id" => 345,
                    "name" => "Huyện Điện Biên Đông",
                ],
                [
                    "id" => 352,
                    "name" => "Huyện Mường Ảng",
                ],
                [
                    "id" => 347,
                    "name" => "Huyện Mường Chà",
                ],
                [
                    "id" => 349,
                    "name" => "Huyện Mường Nhé",
                ],
                [
                    "id" => 908,
                    "name" => "Huyện Nậm Pồ",
                ],
                [
                    "id" => 350,
                    "name" => "Huyện Tủa Chùa",
                ],
                [
                    "id" => 351,
                    "name" => "Huyện Tuần Giáo",
                ],
                [
                    "id" => 348,
                    "name" => "Thị xã Mường Lay",
                ],
            ],
            "order" => 22,
        ],
        [
            "id" => 8,
            "name" => "Đồng Nai",
            "district" => [
                [
                    "id" => 886,
                    "name" => "Thành phố Biên Hoà",
                ],
                [
                    "id" => 882,
                    "name" => "Huyện Cẩm Mỹ",
                ],
                [
                    "id" => 881,
                    "name" => "Huyện Định Quán",
                ],
                [
                    "id" => 887,
                    "name" => "Huyện Long Thành",
                ],
                [
                    "id" => 879,
                    "name" => "Huyện Nhơn Trạch",
                ],
                [
                    "id" => 880,
                    "name" => "Huyện Tân Phú",
                ],
                [
                    "id" => 883,
                    "name" => "Huyện Thống Nhất",
                ],
                [
                    "id" => 884,
                    "name" => "Huyện Trảng Bom",
                ],
                [
                    "id" => 885,
                    "name" => "Huyện Vĩnh Cửu",
                ],
                [
                    "id" => 877,
                    "name" => "Huyện Xuân Lộc",
                ],
                [
                    "id" => 878,
                    "name" => "Thị xã Long Khánh",
                ],
            ],
            "order" => 23,
        ],
        [
            "id" => 115,
            "name" => "Đồng Tháp",
            "district" => [
                [
                    "id" => 363,
                    "name" => "Thành phố Cao Lãnh",
                ],
                [
                    "id" => 358,
                    "name" => "Thành phố Sa Đéc",
                ],
                [
                    "id" => 353,
                    "name" => "Huyện Cao Lãnh",
                ],
                [
                    "id" => 364,
                    "name" => "Huyện Châu Thành",
                ],
                [
                    "id" => 354,
                    "name" => "Huyện Hồng Ngự",
                ],
                [
                    "id" => 356,
                    "name" => "Huyện Lai Vung",
                ],
                [
                    "id" => 357,
                    "name" => "Huyện Lấp Vò",
                ],
                [
                    "id" => 359,
                    "name" => "Huyện Tam Nông",
                ],
                [
                    "id" => 360,
                    "name" => "Huyện Tân Hồng",
                ],
                [
                    "id" => 361,
                    "name" => "Huyện Thanh Bình",
                ],
                [
                    "id" => 362,
                    "name" => "Huyện Tháp Mười",
                ],
                [
                    "id" => 355,
                    "name" => "Thị xã Hồng Ngự",
                ],
            ],
            "order" => 24,
        ],
        [
            "id" => 116,
            "name" => "Gia Lai",
            "district" => [
                [
                    "id" => 379,
                    "name" => "Thành phố Pleiku",
                ],
                [
                    "id" => 367,
                    "name" => "Huyện Chư Păh",
                ],
                [
                    "id" => 368,
                    "name" => "Huyện Chư Prông",
                ],
                [
                    "id" => 897,
                    "name" => "Huyện Chư Pưh",
                ],
                [
                    "id" => 369,
                    "name" => "Huyện Chư Sê",
                ],
                [
                    "id" => 370,
                    "name" => "Huyện Đăk Đoa",
                ],
                [
                    "id" => 380,
                    "name" => "Huyện Đắk Pơ",
                ],
                [
                    "id" => 371,
                    "name" => "Huyện Đức Cơ",
                ],
                [
                    "id" => 372,
                    "name" => "Huyện Ia Grai",
                ],
                [
                    "id" => 373,
                    "name" => "Huyện Ia Pa",
                ],
                [
                    "id" => 374,
                    "name" => "Huyện K'Bang",
                ],
                [
                    "id" => 375,
                    "name" => "Huyện Kông Chro",
                ],
                [
                    "id" => 376,
                    "name" => "Huyện Krông Pa",
                ],
                [
                    "id" => 377,
                    "name" => "Huyện Mang Yang",
                ],
                [
                    "id" => 378,
                    "name" => "Huyện Phú Thiện",
                ],
                [
                    "id" => 365,
                    "name" => "Thị xã An Khê",
                ],
                [
                    "id" => 366,
                    "name" => "Thị xã Ayun Pa",
                ],
            ],
            "order" => 25,
        ],
        [
            "id" => 117,
            "name" => "Hà Giang",
            "district" => [
                [
                    "id" => 384,
                    "name" => "Thành phố Hà Giang",
                ],
                [
                    "id" => 381,
                    "name" => "Huyện Bắc Mê",
                ],
                [
                    "id" => 382,
                    "name" => "Huyện Bắc Quang",
                ],
                [
                    "id" => 383,
                    "name" => "Huyện Đồng Văn",
                ],
                [
                    "id" => 385,
                    "name" => "Huyện Hoàng Su Phì",
                ],
                [
                    "id" => 386,
                    "name" => "Huyện Mèo Vạc",
                ],
                [
                    "id" => 387,
                    "name" => "Huyện Quản Bạ",
                ],
                [
                    "id" => 388,
                    "name" => "Huyện Quang Bình",
                ],
                [
                    "id" => 389,
                    "name" => "Huyện Vị Xuyên",
                ],
                [
                    "id" => 390,
                    "name" => "Huyện Xín Mần",
                ],
                [
                    "id" => 391,
                    "name" => "Huyện Yên Minh",
                ],
            ],
            "order" => 26,
        ],
        [
            "id" => 118,
            "name" => "Hà Nam",
            "district" => [
                [
                    "id" => 396,
                    "name" => "Thành phố Phủ Lý",
                ],
                [
                    "id" => 392,
                    "name" => "Huyện Bình Lục",
                ],
                [
                    "id" => 393,
                    "name" => "Huyện Duy Tiên",
                ],
                [
                    "id" => 394,
                    "name" => "Huyện Kim Bảng",
                ],
                [
                    "id" => 395,
                    "name" => "Huyện Lý Nhân",
                ],
                [
                    "id" => 397,
                    "name" => "Huyện Thanh Liêm",
                ],
            ],
            "order" => 27,
        ],
        [
            "id" => 120,
            "name" => "Hà Tĩnh",
            "district" => [
                [
                    "id" => 409,
                    "name" => "Thành phố Hà Tĩnh",
                ],
                [
                    "id" => 398,
                    "name" => "Huyện Cẩm Xuyên",
                ],
                [
                    "id" => 399,
                    "name" => "Huyện Can Lộc",
                ],
                [
                    "id" => 400,
                    "name" => "Huyện Đức Thọ",
                ],
                [
                    "id" => 402,
                    "name" => "Huyện Hương Khê",
                ],
                [
                    "id" => 403,
                    "name" => "Huyện Hương Sơn",
                ],
                [
                    "id" => 404,
                    "name" => "Huyện Kỳ Anh",
                ],
                [
                    "id" => 405,
                    "name" => "Huyện Lộc Hà",
                ],
                [
                    "id" => 406,
                    "name" => "Huyện Nghi Xuân",
                ],
                [
                    "id" => 407,
                    "name" => "Huyện Thạch Hà",
                ],
                [
                    "id" => 408,
                    "name" => "Huyện Vũ Quang",
                ],
                [
                    "id" => 401,
                    "name" => "Thị xã Hồng Lĩnh",
                ],
                [
                    "id" => 918,
                    "name" => "Thị xã Kỳ Anh",
                ],
            ],
            "order" => 28,
        ],
        [
            "id" => 121,
            "name" => "Hải Dương",
            "district" => [
                [
                    "id" => 414,
                    "name" => "Thành phố Hải Dương",
                ],
                [
                    "id" => 410,
                    "name" => "Huyện Bình Giang",
                ],
                [
                    "id" => 411,
                    "name" => "Huyện Cẩm Giàng",
                ],
                [
                    "id" => 413,
                    "name" => "Huyện Gia Lộc",
                ],
                [
                    "id" => 415,
                    "name" => "Huyện Kim Thành",
                ],
                [
                    "id" => 416,
                    "name" => "Huyện Kinh Môn",
                ],
                [
                    "id" => 417,
                    "name" => "Huyện Nam Sách",
                ],
                [
                    "id" => 418,
                    "name" => "Huyện Ninh Giang",
                ],
                [
                    "id" => 419,
                    "name" => "Huyện Thanh Hà",
                ],
                [
                    "id" => 420,
                    "name" => "Huyện Thanh Miện",
                ],
                [
                    "id" => 421,
                    "name" => "Huyện Tứ Kỳ",
                ],
                [
                    "id" => 412,
                    "name" => "Thị xã Chí Linh",
                ],
            ],
            "order" => 29,
        ],
        [
            "id" => 122,
            "name" => "Hậu Giang",
            "district" => [
                [
                    "id" => 427,
                    "name" => "Thành phố Vị Thanh",
                ],
                [
                    "id" => 422,
                    "name" => "Huyện Châu Thành",
                ],
                [
                    "id" => 423,
                    "name" => "Huyện Châu Thành A",
                ],
                [
                    "id" => 424,
                    "name" => "Huyện Long Mỹ",
                ],
                [
                    "id" => 426,
                    "name" => "Huyện Phụng Hiệp",
                ],
                [
                    "id" => 428,
                    "name" => "Huyện Vị Thủy",
                ],
                [
                    "id" => 425,
                    "name" => "Thị xã Ngã Bảy",
                ],
            ],
            "order" => 30,
        ],
        [
            "id" => 123,
            "name" => "Hoà Bình",
            "district" => [
                [
                    "id" => 431,
                    "name" => "Thành phố Hoà Bình",
                ],
                [
                    "id" => 429,
                    "name" => "Huyện Cao Phong",
                ],
                [
                    "id" => 430,
                    "name" => "Huyện Đà Bắc",
                ],
                [
                    "id" => 432,
                    "name" => "Huyện Kim Bôi",
                ],
                [
                    "id" => 433,
                    "name" => "Huyện Kỳ Sơn",
                ],
                [
                    "id" => 434,
                    "name" => "Huyện Lạc Sơn",
                ],
                [
                    "id" => 435,
                    "name" => "Huyện Lạc Thủy",
                ],
                [
                    "id" => 436,
                    "name" => "Huyện Lương Sơn",
                ],
                [
                    "id" => 437,
                    "name" => "Huyện Mai Châu",
                ],
                [
                    "id" => 439,
                    "name" => "Huyện Tân Lạc",
                ],
                [
                    "id" => 438,
                    "name" => "Huyện Yên Thủy",
                ],
            ],
            "order" => 31,
        ],
        [
            "id" => 124,
            "name" => "Hưng Yên",
            "district" => [
                [
                    "id" => 441,
                    "name" => "Thành phố Hưng Yên",
                ],
                [
                    "id" => 440,
                    "name" => "Huyện Ân Thi",
                ],
                [
                    "id" => 442,
                    "name" => "Huyện Khoái Châu",
                ],
                [
                    "id" => 443,
                    "name" => "Huyện Kim Động",
                ],
                [
                    "id" => 444,
                    "name" => "Huyện Mỹ Hào",
                ],
                [
                    "id" => 445,
                    "name" => "Huyện Phù Cừ",
                ],
                [
                    "id" => 446,
                    "name" => "Huyện Tiên Lữ",
                ],
                [
                    "id" => 447,
                    "name" => "Huyện Văn Giang",
                ],
                [
                    "id" => 448,
                    "name" => "Huyện Văn Lâm",
                ],
                [
                    "id" => 449,
                    "name" => "Huyện Yên Mỹ",
                ],
            ],
            "order" => 32,
        ],
        [
            "id" => 126,
            "name" => "Kiên Giang",
            "district" => [
                [
                    "id" => 471,
                    "name" => "Thành phố Rạch Giá",
                ],
                [
                    "id" => 462,
                    "name" => "Huyện An Biên",
                ],
                [
                    "id" => 467,
                    "name" => "Huyện An Minh",
                ],
                [
                    "id" => 468,
                    "name" => "Huyện Châu Thành",
                ],
                [
                    "id" => 473,
                    "name" => "Huyện Giang Thành",
                ],
                [
                    "id" => 461,
                    "name" => "Huyện Giồng Riềng",
                ],
                [
                    "id" => 463,
                    "name" => "Huyện Gò Quao",
                ],
                [
                    "id" => 460,
                    "name" => "Huyện Hòn Đất",
                ],
                [
                    "id" => 469,
                    "name" => "Huyện Kiên Hải",
                ],
                [
                    "id" => 466,
                    "name" => "Huyện Kiên Lương",
                ],
                [
                    "id" => 470,
                    "name" => "Huyện Phú Quốc",
                ],
                [
                    "id" => 464,
                    "name" => "Huyện Tân Hiệp",
                ],
                [
                    "id" => 472,
                    "name" => "Huyện U Minh Thượng",
                ],
                [
                    "id" => 465,
                    "name" => "Huyện Vĩnh Thuận",
                ],
                [
                    "id" => 459,
                    "name" => "Thị xã Hà Tiên",
                ],
            ],
            "order" => 33,
        ],
        [
            "id" => 127,
            "name" => "Kon Tum",
            "district" => [
                [
                    "id" => 474,
                    "name" => "Thành phố KonTum",
                ],
                [
                    "id" => 475,
                    "name" => "Huyện Đăk Glei",
                ],
                [
                    "id" => 480,
                    "name" => "Huyện Đăk Hà",
                ],
                [
                    "id" => 477,
                    "name" => "Huyện Đăk Tô",
                ],
                [
                    "id" => 919,
                    "name" => "Huyên Ia H'drai",
                ],
                [
                    "id" => 479,
                    "name" => "Huyện Kon Plong",
                ],
                [
                    "id" => 905,
                    "name" => "Huyện Kon Rẫy",
                ],
                [
                    "id" => 476,
                    "name" => "Huyện Ngọc Hồi",
                ],
                [
                    "id" => 478,
                    "name" => "Huyện Sa Thầy",
                ],
                [
                    "id" => 482,
                    "name" => "Huyện Tu Mơ Rông",
                ],
            ],
            "order" => 34,
        ],
        [
            "id" => 128,
            "name" => "Lai Châu",
            "district" => [
                [
                    "id" => 483,
                    "name" => "Thành phố Lai Châu",
                ],
                [
                    "id" => 484,
                    "name" => "Huyện Mường Tè",
                ],
                [
                    "id" => 904,
                    "name" => "Huyện Nậm Nhùn",
                ],
                [
                    "id" => 488,
                    "name" => "Huyện Phong Thổ",
                ],
                [
                    "id" => 485,
                    "name" => "Huyện Sìn Hồ",
                ],
                [
                    "id" => 489,
                    "name" => "Huyện Tam Đường",
                ],
                [
                    "id" => 486,
                    "name" => "	Huyện Tân Uyên",
                ],
                [
                    "id" => 490,
                    "name" => "Huyện Than Uyên",
                ],
            ],
            "order" => 35,
        ],
        [
            "id" => 130,
            "name" => "Lạng Sơn",
            "district" => [
                [
                    "id" => 508,
                    "name" => "Thành phố Lạng Sơn",
                ],
                [
                    "id" => 512,
                    "name" => "Huyện Bắc Sơn",
                ],
                [
                    "id" => 503,
                    "name" => "Huyện Bình Gia",
                ],
                [
                    "id" => 504,
                    "name" => "Huyện Cao Lộc",
                ],
                [
                    "id" => 505,
                    "name" => "Huyện Chi Lăng",
                ],
                [
                    "id" => 506,
                    "name" => "Huyện Đình Lập",
                ],
                [
                    "id" => 507,
                    "name" => "Huyện Hữu Lũng",
                ],
                [
                    "id" => 509,
                    "name" => "Huyện Lộc Bình",
                ],
                [
                    "id" => 510,
                    "name" => "Huyện Tràng Định",
                ],
                [
                    "id" => 513,
                    "name" => "Huyện Vãn Lãng",
                ],
                [
                    "id" => 511,
                    "name" => "Huyện Văn Quan",
                ],
            ],
            "order" => 36,
        ],
        [
            "id" => 131,
            "name" => "Lào Cai",
            "district" => [
                [
                    "id" => 516,
                    "name" => "Thành phố Lào Cai",
                ],
                [
                    "id" => 519,
                    "name" => "Huyện Bắc Hà",
                ],
                [
                    "id" => 514,
                    "name" => "Huyện Bảo Thắng",
                ],
                [
                    "id" => 521,
                    "name" => "Huyện Bảo Yên",
                ],
                [
                    "id" => 515,
                    "name" => "Huyện Bát Xát",
                ],
                [
                    "id" => 522,
                    "name" => "Huyện Mường Khương",
                ],
                [
                    "id" => 520,
                    "name" => "Huyện Sa Pa",
                ],
                [
                    "id" => 517,
                    "name" => "Huyện Si Ma Cai",
                ],
                [
                    "id" => 518,
                    "name" => "Huyện Văn Bàn",
                ],
            ],
            "order" => 37,
        ],
        [
            "id" => 129,
            "name" => "Lâm Đồng",
            "district" => [
                [
                    "id" => 495,
                    "name" => "Thành phố Đà Lạt",
                ],
                [
                    "id" => 492,
                    "name" => "Thành phố Bảo Lộc",
                ],
                [
                    "id" => 491,
                    "name" => "Huyện Bảo Lâm",
                ],
                [
                    "id" => 493,
                    "name" => "Huyện Cát Tiên",
                ],
                [
                    "id" => 494,
                    "name" => "Huyện Đạ Huoai",
                ],
                [
                    "id" => 501,
                    "name" => "Huyện Đạ Tẻh",
                ],
                [
                    "id" => 496,
                    "name" => "Huyện Đam Rông",
                ],
                [
                    "id" => 497,
                    "name" => "Huyện Di Linh",
                ],
                [
                    "id" => 502,
                    "name" => "Huyện Đơn Dương",
                ],
                [
                    "id" => 498,
                    "name" => "Huyện Đức Trọng",
                ],
                [
                    "id" => 499,
                    "name" => "Huyện Lạc Dương",
                ],
                [
                    "id" => 500,
                    "name" => "Huyện Lâm Hà",
                ],
            ],
            "order" => 38,
        ],
        [
            "id" => 132,
            "name" => "Long An",
            "district" => [
                [
                    "id" => 528,
                    "name" => "Thành phố Tân An",
                ],
                [
                    "id" => 523,
                    "name" => "Huyện Bến Lức",
                ],
                [
                    "id" => 524,
                    "name" => "Huyện Cần Đước",
                ],
                [
                    "id" => 525,
                    "name" => "Huyện Cần Giuộc",
                ],
                [
                    "id" => 533,
                    "name" => "Huyện Châu Thành",
                ],
                [
                    "id" => 526,
                    "name" => "Huyện Đức Hòa",
                ],
                [
                    "id" => 527,
                    "name" => "Huyện Đức Huệ",
                ],
                [
                    "id" => 536,
                    "name" => "Huyện Mộc Hóa",
                ],
                [
                    "id" => 529,
                    "name" => "Huyện Tân Hưng",
                ],
                [
                    "id" => 535,
                    "name" => "Huyện Tân Thạnh",
                ],
                [
                    "id" => 530,
                    "name" => "Huyện Tân Trụ",
                ],
                [
                    "id" => 531,
                    "name" => "Huyện Thạnh Hóa",
                ],
                [
                    "id" => 534,
                    "name" => "Huyện Thủ Thừa",
                ],
                [
                    "id" => 532,
                    "name" => "Huyện Vĩnh Hưng",
                ],
                [
                    "id" => 911,
                    "name" => "Thị xã Kiến Tường",
                ],
            ],
            "order" => 39,
        ],
        [
            "id" => 133,
            "name" => "Nam Định",
            "district" => [
                [
                    "id" => 540,
                    "name" => "	Thành phố Nam Định",
                ],
                [
                    "id" => 537,
                    "name" => "Huyện Giao Thủy",
                ],
                [
                    "id" => 538,
                    "name" => "Huyện Hải Hậu",
                ],
                [
                    "id" => 539,
                    "name" => "Huyện Mỹ Lộc",
                ],
                [
                    "id" => 541,
                    "name" => "Huyện Nam Trực",
                ],
                [
                    "id" => 542,
                    "name" => "Huyện Nghĩa Hưng",
                ],
                [
                    "id" => 545,
                    "name" => "Huyện Trực Ninh",
                ],
                [
                    "id" => 546,
                    "name" => "Huyện Vụ Bản",
                ],
                [
                    "id" => 543,
                    "name" => "Huyện Xuân Trường",
                ],
                [
                    "id" => 544,
                    "name" => "Huyện Ý Yên",
                ],
            ],
            "order" => 40,
        ],
        [
            "id" => 134,
            "name" => "Nghệ An",
            "district" => [
                [
                    "id" => 563,
                    "name" => "Thành phố Vinh",
                ],
                [
                    "id" => 565,
                    "name" => "Huyện Anh Sơn",
                ],
                [
                    "id" => 566,
                    "name" => "Huyện Con Cuông",
                ],
                [
                    "id" => 548,
                    "name" => "Huyện Diễn Châu",
                ],
                [
                    "id" => 549,
                    "name" => "Huyện Đô Lương",
                ],
                [
                    "id" => 550,
                    "name" => "Huyện Hưng Nguyên",
                ],
                [
                    "id" => 551,
                    "name" => "Huyện Kỳ Sơn",
                ],
                [
                    "id" => 552,
                    "name" => "Huyện Nam Đàn",
                ],
                [
                    "id" => 553,
                    "name" => "Huyện Nghi Lộc",
                ],
                [
                    "id" => 554,
                    "name" => "	Huyện Nghĩa Đàn",
                ],
                [
                    "id" => 555,
                    "name" => "Huyện Quế Phong",
                ],
                [
                    "id" => 556,
                    "name" => "Huyện Quỳ Châu",
                ],
                [
                    "id" => 557,
                    "name" => "Huyện Quỳ Hợp",
                ],
                [
                    "id" => 558,
                    "name" => "Huyện Quỳnh Lưu",
                ],
                [
                    "id" => 559,
                    "name" => "Huyện Tân Kỳ",
                ],
                [
                    "id" => 561,
                    "name" => "Huyện Thanh Chương",
                ],
                [
                    "id" => 562,
                    "name" => "Huyện Tương Dương",
                ],
                [
                    "id" => 564,
                    "name" => "Huyện Yên Thành",
                ],
                [
                    "id" => 547,
                    "name" => "Thị xã Cửa Lò",
                ],
                [
                    "id" => 920,
                    "name" => "Thị xã Hoàng Mai",
                ],
                [
                    "id" => 560,
                    "name" => "Thị xã Thái Hòa",
                ],
            ],
            "order" => 41,
        ],
        [
            "id" => 135,
            "name" => "Ninh Bình",
            "district" => [
                [
                    "id" => 571,
                    "name" => "Thành phố Ninh Bình",
                ],
                [
                    "id" => 572,
                    "name" => "Thành phố Tam Điệp",
                ],
                [
                    "id" => 567,
                    "name" => "Huyện Gia Viễn",
                ],
                [
                    "id" => 568,
                    "name" => "	Huyện Hoa Lư",
                ],
                [
                    "id" => 569,
                    "name" => "Huyện Kim Sơn",
                ],
                [
                    "id" => 570,
                    "name" => "Huyện Nho Quan",
                ],
                [
                    "id" => 574,
                    "name" => "Huyện Yên Khánh",
                ],
                [
                    "id" => 573,
                    "name" => "Huyện Yên Mô",
                ],
            ],
            "order" => 42,
        ],
        [
            "id" => 136,
            "name" => "Ninh Thuận",
            "district" => [
                [
                    "id" => 579,
                    "name" => "Tp.Phan Rang-Tháp Chàm",
                ],
                [
                    "id" => 575,
                    "name" => "	Huyện Bác Ái",
                ],
                [
                    "id" => 576,
                    "name" => "	Huyện Ninh Hải",
                ],
                [
                    "id" => 577,
                    "name" => "Huyện Ninh Phước",
                ],
                [
                    "id" => 578,
                    "name" => "Huyện Ninh Sơn",
                ],
                [
                    "id" => 580,
                    "name" => "Huyện Thuận Bắc",
                ],
                [
                    "id" => 902,
                    "name" => "Huyện Thuận Nam",
                ],
            ],
            "order" => 43,
        ],
        [
            "id" => 137,
            "name" => "Phú Thọ",
            "district" => [


                [
                    "id" => "592",
                    "name" => "Thành phố Việt Trì",
                ],

                [
                    "id" => "581",
                    "name" => "Huyện Cẩm Khê",
                ],

                [
                    "id" => "582",
                    "name" => "Huyện Đoan Hùng",
                ],

                [
                    "id" => "583",
                    "name" => "Huyện Hạ Hòa",
                ],

                [
                    "id" => "584",
                    "name" => "Huyện Lâm Thao",
                ],

                [
                    "id" => "585",
                    "name" => "Huyện Phù Ninh",
                ],

                [
                    "id" => "587",
                    "name" => "Huyện Tam Nông",
                ],

                [
                    "id" => "588",
                    "name" => "Huyện Tân Sơn",
                ],

                [
                    "id" => "589",
                    "name" => "Huyện Thanh Ba",
                ],

                [
                    "id" => "590",
                    "name" => "Huyện Thanh Sơn",
                ],

                [
                    "id" => "591",
                    "name" => "Huyện Thanh Thủy",
                ],

                [
                    "id" => "593",
                    "name" => "Huyện Yên Lập",
                ],

                [
                    "id" => "586",
                    "name" => "Thị xã Phú Thọ",
                ],
            ],
            "order" => 44,
        ],
        [
            "id" => 138,
            "name" => "Phú Yên",
            "district" => [


                [
                    "id" => "601",
                    "name" => "Thành phố Tuy Hòa",
                ],

                [
                    "id" => "594",
                    "name" => "Huyện Đông Hòa",
                ],

                [
                    "id" => "602",
                    "name" => "Huyện Đồng Xuân",
                ],

                [
                    "id" => "595",
                    "name" => "Huyện Phú Hòa",
                ],

                [
                    "id" => "596",
                    "name" => "Huyện Sơn Hòa",
                ],

                [
                    "id" => "598",
                    "name" => "Huyện Sông Hinh",
                ],

                [
                    "id" => "599",
                    "name" => "Huyện Tây Hòa",
                ],

                [
                    "id" => "600",
                    "name" => "Huyện Tuy An",
                ],

                [
                    "id" => "597",
                    "name" => "Thị xã Sông Cầu",
                ],
            ],
            "order" => 45,
        ],
        [
            "id" => 139,
            "name" => "Quảng Bình",
            "district" => [


                [
                    "id" => "604",
                    "name" => "Thành phố Đồng Hới",
                ],

                [
                    "id" => "603",
                    "name" => "Huyện Bố Trạch",
                ],

                [
                    "id" => "605",
                    "name" => "Huyện Lệ Thủy",
                ],

                [
                    "id" => "606",
                    "name" => "Huyện Minh Hóa",
                ],

                [
                    "id" => "607",
                    "name" => "Huyện Quảng Ninh",
                ],

                [
                    "id" => "608",
                    "name" => "Huyện Quảng Trạch",
                ],

                [
                    "id" => "609",
                    "name" => "Huyện Tuyên Hóa",
                ],

                [
                    "id" => "907",
                    "name" => "Thị xã Ba Đồn",
                ],
            ],
            "order" => 46,
        ],
        [
            "id" => 140,
            "name" => "Quảng Nam",
            "district" => [


                [
                    "id" => "620",
                    "name" => "Thành phố Tam Kỳ",
                ],

                [
                    "id" => "615",
                    "name" => "Thành phố Hội An",
                ],

                [
                    "id" => "610",
                    "name" => "Huyện Bắc Trà My",
                ],

                [
                    "id" => "611",
                    "name" => "Huyện Đại Lộc",
                ],

                [
                    "id" => "625",
                    "name" => "Huyện Đông Giang",
                ],

                [
                    "id" => "613",
                    "name" => "Huyện Duy Xuyên",
                ],

                [
                    "id" => "614",
                    "name" => "Huyện Hiệp Đức",
                ],

                [
                    "id" => "623",
                    "name" => "Huyện Nam Giang",
                ],

                [
                    "id" => "624",
                    "name" => "Huyện Nam Trà My",
                ],

                [
                    "id" => "616",
                    "name" => "Huyện Nông Sơn",
                ],

                [
                    "id" => "617",
                    "name" => "Huyện Núi Thành",
                ],

                [
                    "id" => "626",
                    "name" => "Huyện Phú Ninh",
                ],

                [
                    "id" => "618",
                    "name" => "Huyện Phước Sơn",
                ],

                [
                    "id" => "619",
                    "name" => "Huyện Quế Sơn",
                ],

                [
                    "id" => "627",
                    "name" => "Huyện Tây Giang",
                ],

                [
                    "id" => "621",
                    "name" => "Huyện Thăng Bình",
                ],

                [
                    "id" => "622",
                    "name" => "Huyện Tiên Phước",
                ],

                [
                    "id" => "612",
                    "name" => "Thị xã Điện Bàn",
                ],
            ],
            "order" => 47,
        ],
        [
            "id" => 141,
            "name" => "Quảng Ngãi",
            "district" => [
                [
                    "id" => "634",
                    "name" => "Thành phố Quảng Ngãi",
                ],         [
                    "id" => "628",
                    "name" => "Huyện Ba Tơ",
                ],         [
                    "id" => "640",
                    "name" => "Huyện Bình Sơn",
                ],         [
                    "id" => "629",
                    "name" => "Huyện Đức Phổ",
                ],         [
                    "id" => "630",
                    "name" => "Huyện Lý Sơn",
                ],         [
                    "id" => "631",
                    "name" => "Huyện Minh Long",
                ],         [
                    "id" => "632",
                    "name" => "Huyện Mộ Đức",
                ],         [
                    "id" => "633",
                    "name" => "Huyện Nghĩa Hành",
                ],         [
                    "id" => "635",
                    "name" => "Huyện Sơn Hà",
                ],         [
                    "id" => "636",
                    "name" => "Huyện Sơn Tây",
                ],         [
                    "id" => "639",
                    "name" => "Huyện Sơn Tịnh",
                ],         [
                    "id" => "641",
                    "name" => "Huyện Tây Trà",
                ],         [
                    "id" => "637",
                    "name" => "Huyện Trà Bồng",
                ],         [
                    "id" => "638",
                    "name" => "Huyện Tư Nghĩa",
                ],
            ],
            "order" => 48,
        ],
        [
            "id" => 142,
            "name" => "Quảng Ninh",
            "district" => [
                [
                    "id" => "644",
                    "name" => "Thành phố Cẩm Phả",
                ],
                [
                    "id" => "647",
                    "name" => "Thành phố Hạ Long",
                ],
                [
                    "id" => "649",
                    "name" => "Thành phố Móng Cái",
                ],
                [
                    "id" => "651",
                    "name" => "Thành phố Uông Bí",
                ],
                [
                    "id" => "642",
                    "name" => "Huyện Ba Chẽ",
                ],
                [
                    "id" => "643",
                    "name" => "Huyện Bình Liêu",
                ],
                [
                    "id" => "645",
                    "name" => "Huyện Cô Tô",
                ],
                [
                    "id" => "646",
                    "name" => "Huyện Đầm Hà",
                ],
                [
                    "id" => "655",
                    "name" => "Huyện Hải Hà",
                ],
                [
                    "id" => "648",
                    "name" => "Huyện Hoành Bồ",
                ],
                [
                    "id" => "650",
                    "name" => "Huyện Tiên Yên",
                ],
                [
                    "id" => "652",
                    "name" => "Huyện Vân Đồn",
                ],
                [
                    "id" => "654",
                    "name" => "Thị xã Đông Triều",
                ],
                [
                    "id" => "900",
                    "name" => "Thị xã Quảng Yên",
                ],
            ],
            "order" => 49,
        ],
        [
            "id" => 143,
            "name" => "Quảng Trị",
            "district" => [

                [
                    "id" => "657",
                    "name" => "Huyện Cam Lộ",
                ],
                [
                    "id" => "659",
                    "name" => "Thành phố Đông Hà",
                ],
                [
                    "id" => "666",
                    "name" => "Huyện Cồn Cỏ",
                ],
                [
                    "id" => "658",
                    "name" => "Huyện Đa Krông",
                ],
                [
                    "id" => "660",
                    "name" => "Huyện Gio Linh",
                ],
                [
                    "id" => "665",
                    "name" => "Huyện Hải Lăng",
                ],
                [
                    "id" => "664",
                    "name" => "Huyện Hướng Hóa",
                ],
                [
                    "id" => "662",
                    "name" => "Huyện Triệu Phong",
                ],
                [
                    "id" => "663",
                    "name" => "Huyện Vĩnh Linh",
                ],
                [
                    "id" => "661",
                    "name" => "Thị xã Quảng Trị",
                ],
            ],
            "order" => 50,
        ],
        [
            "id" => 144,
            "name" => "Sóc Trăng",
            "district" => [
                [
                    "id" => "673",
                    "name" => "Thành phố Sóc Trăng",
                ],
                [
                    "id" => "667",
                    "name" => "Huyện Châu Thành",
                ],
                [
                    "id" => "668",
                    "name" => "Huyện Cù Lao Dung",
                ],
                [
                    "id" => "669",
                    "name" => "Huyện Kế Sách",
                ],
                [
                    "id" => "676",
                    "name" => "Huyện Long Phú",
                ],
                [
                    "id" => "670",
                    "name" => "Huyện Mỹ Tú",
                ],
                [
                    "id" => "671",
                    "name" => "Huyện Mỹ Xuyên",
                ],
                [
                    "id" => "674",
                    "name" => "Huyện Thạnh Trị",
                ],
                [
                    "id" => "903",
                    "name" => "Huyện Trần Đề",
                ],
                [
                    "id" => "672",
                    "name" => "Thị xã Ngã Năm",
                ],
                [
                    "id" => "675",
                    "name" => "Thị xã Vĩnh Châu",
                ],
            ],
            "order" => 51,
        ],
        [
            "id" => 145,
            "name" => "Sơn La",
            "district" => [
                [
                    "id" => "681",
                    "name" => "Thành phố Sơn La",
                ],
                [
                    "id" => "677",
                    "name" => "Huyện Bắc Yên",
                ],
                [
                    "id" => "686",
                    "name" => "Huyện Mai Sơn",
                ],
                [
                    "id" => "685",
                    "name" => "Huyện Mộc Châu",
                ],
                [
                    "id" => "678",
                    "name" => "Huyện Mường La",
                ],
                [
                    "id" => "679",
                    "name" => "Huyện Phù Yên",
                ],
                [
                    "id" => "680",
                    "name" => "Huyện Quỳnh Nhai",
                ],
                [
                    "id" => "682",
                    "name" => "Huyện Sông Mã",
                ],
                [
                    "id" => "683",
                    "name" => "Huyện Sốp Cộp",
                ],
                [
                    "id" => "684",
                    "name" => "Huyện Thuận Châu",
                ],
                [
                    "id" => "899",
                    "name" => "Huyện Vân Hồ",
                ],
                [
                    "id" => "687",
                    "name" => "Huyện Yên Châu",
                ],
            ],
            "order" => 52,
        ],
        [
            "id" => 146,
            "name" => "Tây Ninh",
            "district" => [

                [
                    "id" => "692",
                    "name" => "Thành phố Tây Ninh",
                ],
                [
                    "id" => "695",
                    "name" => "Huyện Bến Cầu",
                ],
                [
                    "id" => "696",
                    "name" => "Huyện Châu Thành",
                ],
                [
                    "id" => "688",
                    "name" => "Huyện Dương Minh Châu",
                ],
                [
                    "id" => "689",
                    "name" => "Huyện Gò Dầu",
                ],
                [
                    "id" => "694",
                    "name" => "Huyện Hòa Thành",
                ],
                [
                    "id" => "690",
                    "name" => "Huyện Tân Biên",
                ],
                [
                    "id" => "691",
                    "name" => "Huyện Tân Châu",
                ],
                [
                    "id" => "693",
                    "name" => "Huyện Trảng Bàng",
                ],
            ],
            "order" => 53,
        ],
        [
            "id" => 147,
            "name" => "Thái Bình",
            "district" => [

                [
                    "id" => "697",
                    "name" => "Thành phố Thái Bình",
                ],
                [
                    "id" => "701",
                    "name" => "Huyện Đông Hưng",
                ],
                [
                    "id" => "703",
                    "name" => "Huyện Hưng Hà",
                ],
                [
                    "id" => "704",
                    "name" => "Huyện Kiến Xương",
                ],
                [
                    "id" => "702",
                    "name" => "Huyện Quỳnh Phụ",
                ],
                [
                    "id" => "698",
                    "name" => "Huyện Thái Thụy",
                ],
                [
                    "id" => "699",
                    "name" => "Huyện Tiền Hải",
                ],
                [
                    "id" => "700",
                    "name" => "Huyện Vũ Thư",
                ],
            ],
            "order" => 54,
        ],
        [
            "id" => 148,
            "name" => "Thái Nguyên",
            "district" => [
                [
                    "id" => "712",
                    "name" => "Thành phố Thái Nguyên",
                ],
                [
                    "id" => "705",
                    "name" => "Huyện Đại Từ",
                ],
                [
                    "id" => "706",
                    "name" => "Huyện Định Hóa",
                ],
                [
                    "id" => "707",
                    "name" => "Huyện Đồng Hỷ",
                ],
                [
                    "id" => "708",
                    "name" => "Huyện Phổ Yên",
                ],
                [
                    "id" => "709",
                    "name" => "Huyện Phú Bình",
                ],
                [
                    "id" => "710",
                    "name" => "Huyện Phú Lương",
                ],
                [
                    "id" => "713",
                    "name" => "Huyện Võ Nhai",
                ],
                [
                    "id" => "711",
                    "name" => "Thị xã Sông Công",
                ],
            ],
            "order" => 55,
        ],
        [
            "id" => 149,
            "name" => "Thanh Hoá",
            "district" => [
                [
                    "id" => "727",
                    "name" => "Thành phố Thanh Hóa",
                ],
                [
                    "id" => "714",
                    "name" => "Huyện Bá Thước",
                ],
                [
                    "id" => "716",
                    "name" => "Huyện Cẩm Thủy",
                ],
                [
                    "id" => "717",
                    "name" => "Huyện Đông Sơn",
                ],
                [
                    "id" => "718",
                    "name" => "Huyện Hà Trung",
                ],
                [
                    "id" => "719",
                    "name" => "Huyện Hậu Lộc",
                ],
                [
                    "id" => "738",
                    "name" => "Huyện Hoằng Hóa",
                ],
                [
                    "id" => "735",
                    "name" => "Huyện Lang Chánh",
                ],
                [
                    "id" => "720",
                    "name" => "Huyện Mường Lát",
                ],
                [
                    "id" => "721",
                    "name" => "Huyện Nga Sơn",
                ],
                [
                    "id" => "734",
                    "name" => "Huyện Ngọc Lặc",
                ],
                [
                    "id" => "736",
                    "name" => "Huyện Như Thanh",
                ],
                [
                    "id" => "722",
                    "name" => "Huyện Như Xuân",
                ],
                [
                    "id" => "723",
                    "name" => "Huyện Nông Cống",
                ],
                [
                    "id" => "739",
                    "name" => "Huyện Quan Hóa",
                ],
                [
                    "id" => "737",
                    "name" => "Huyện Quan Sơn",
                ],
                [
                    "id" => "724",
                    "name" => "Huyện Quảng Xương",
                ],
                [
                    "id" => "726",
                    "name" => "Huyện Thạch Thành",
                ],
                [
                    "id" => "728",
                    "name" => "Huyện Thiệu Hóa",
                ],
                [
                    "id" => "729",
                    "name" => "Huyện Thọ Xuân",
                ],
                [
                    "id" => "730",
                    "name" => "Huyện Thường Xuân",
                ],
                [
                    "id" => "740",
                    "name" => "Huyện Tĩnh Gia",
                ],
                [
                    "id" => "731",
                    "name" => "Huyện Triệu Sơn",
                ],
                [
                    "id" => "732",
                    "name" => "Huyện Vĩnh Lộc",
                ],
                [
                    "id" => "733",
                    "name" => "Huyện Yên Định",
                ],
                [
                    "id" => "715",
                    "name" => "Thị xã Bỉm Sơn",
                ],
                [
                    "id" => "725",
                    "name" => "Thị xã Sầm Sơn",
                ],
            ],
            "order" => 56,
        ],
        [
            "id" => 150,
            "name" => "Thừa Thiên - Huế",
            "district" => [
                [
                    "id" => "741",
                    "name" => "Thành phố Huế",
                ],
                [
                    "id" => "747",
                    "name" => "Huyện A Lưới",
                ],
                [
                    "id" => "744",
                    "name" => "Huyện Nam Đông",
                ],
                [
                    "id" => "746",
                    "name" => "Huyện Phong Điền",
                ],
                [
                    "id" => "748",
                    "name" => "Huyện Phú Lộc",
                ],
                [
                    "id" => "745",
                    "name" => "Huyện Phú Vang",
                ],
                [
                    "id" => "749",
                    "name" => "Huyện Quảng Điền",
                ],
                [
                    "id" => "742",
                    "name" => "Thị xã Hương Thủy",
                ],
                [
                    "id" => "743",
                    "name" => "Thị xã Hương Trà",
                ],
            ],
            "order" => 57,
        ],
        [
            "id" => 151,
            "name" => "Tiền Giang",
            "district" => [
                [
                    "id" => "755",
                    "name" => "Thành phố Mỹ Tho",
                ],
                [
                    "id" => "750",
                    "name" => "Huyện Cái Bè",
                ],
                [
                    "id" => "751",
                    "name" => "Huyện Cai Lậy",
                ],
                [
                    "id" => "758",
                    "name" => "Huyện Châu Thành",
                ],
                [
                    "id" => "752",
                    "name" => "Huyện Chợ Gạo",
                ],
                [
                    "id" => "759",
                    "name" => "Huyện Gò Công Đông",
                ],
                [
                    "id" => "754",
                    "name" => "Huyện Gò Công Tây",
                ],
                [
                    "id" => "756",
                    "name" => "Huyện Tân Phú Đông",
                ],
                [
                    "id" => "757",
                    "name" => "Huyện Tân Phước",
                ],
                [
                    "id" => "921",
                    "name" => "Thị xã Cai Lậy",
                ],
                [
                    "id" => "753",
                    "name" => "Thị xã Gò Công",
                ],
            ],
            "order" => 58,
        ],
        [
            "id" => 152,
            "name" => "Trà Vinh",
            "district" => [
                [
                    "id" => "765",
                    "name" => "Thành phố Trà Vinh",
                ],
                [
                    "id" => "760",
                    "name" => "Huyện Càng Long",
                ],
                [
                    "id" => "767",
                    "name" => "Huyện Cầu Kè",
                ],
                [
                    "id" => "766",
                    "name" => "Huyện Cầu Ngang",
                ],
                [
                    "id" => "761",
                    "name" => "Huyện Châu Thành",
                ],
                [
                    "id" => "762",
                    "name" => "Huyện Duyên Hải",
                ],
                [
                    "id" => "763",
                    "name" => "Huyện Tiểu Cần",
                ],
                [
                    "id" => "764",
                    "name" => "Huyện Trà Cú",
                ],
            ],
            "order" => 59,
        ],
        [
            "id" => 153,

            "name" => "Tuyên Quang",
            "district" => [

                [
                    "id" => "770",
                    "name" => "Thành phố Tuyên Quang",
                ],
                [
                    "id" => "768",
                    "name" => "Huyện Chiêm Hóa",
                ],
                [
                    "id" => "772",
                    "name" => "Huyện Hàm Yên",
                ],
                [
                    "id" => "913",
                    "name" => "Huyện Lâm Bình",
                ],
                [
                    "id" => "773",
                    "name" => "Huyện Na Hang",
                ],
                [
                    "id" => "769",
                    "name" => "Huyện Sơn Dương",
                ],
                [
                    "id" => "771",
                    "name" => "Huyện Yên Sơn",
                ],

            ],
            "order" => 60,

        ],
        [
            "id" => 154,

            "name" => "Vĩnh Long",
            "district" => [

                [
                    "id" => "778",
                    "name" => "Thành phố Vĩnh Long",
                ],
                [
                    "id" => "780",
                    "name" => "Huyện Bình Tân",
                ],
                [
                    "id" => "775",
                    "name" => "Huyện Long Hồ",
                ],
                [
                    "id" => "781",
                    "name" => "Huyện Mang Thít",
                ],
                [
                    "id" => "776",
                    "name" => "Huyện Tam Bình",
                ],
                [
                    "id" => "777",
                    "name" => "Huyện Trà Ôn",
                ],
                [
                    "id" => "779",
                    "name" => "Huyện Vũng Liêm",
                ],
                [
                    "id" => "774",
                    "name" => "Thị xã Bình Minh",
                ],

            ],
            "order" => 61,

        ],
        [
            "id" => 155,

            "name" => "Vĩnh Phúc",
            "district" => [

                [
                    "id" => "785",
                    "name" => "Thành phố Vĩnh Yên",
                ],
                [
                    "id" => "787",
                    "name" => "Huyện Bình Xuyên",
                ],
                [
                    "id" => "782",
                    "name" => "Huyện Lập Thạch",
                ],
                [
                    "id" => "906",
                    "name" => "Huyện Sông Lô",
                ],
                [
                    "id" => "784",
                    "name" => "Huyện Tam Đảo",
                ],
                [
                    "id" => "788",
                    "name" => "Huyện Tam Dương",
                ],
                [
                    "id" => "789",
                    "name" => "Huyện Vĩnh Tường",
                ],
                [
                    "id" => "786",
                    "name" => "Huyện Yên Lạc",
                ],

            ],
            "order" => 62,

        ],
        [
            "id" => 156,

            "name" => "Yên Bái",
            "district" => [

                [
                    "id" => "796",
                    "name" => "Thành phố Yên Bái",
                ],
                [
                    "id" => "790",
                    "name" => "Huyện Lục Yên",
                ],
                [
                    "id" => "791",
                    "name" => "Huyện Mù Căng Chải",
                ],
                [
                    "id" => "793",
                    "name" => "Huyện Trạm Tấu",
                ],
                [
                    "id" => "794",
                    "name" => "Huyện Trấn Yên",
                ],
                [
                    "id" => "798",
                    "name" => "Huyện Văn Chấn",
                ],
                [
                    "id" => "795",
                    "name" => "Huyện Văn Yên",
                ],
                [
                    "id" => "797",
                    "name" => "Huyện Yên Bình",
                ],
                [
                    "id" => "792",
                    "name" => "Thị xã Nghĩa Lộ",
                ],

            ],
            "order" => 63,

        ],

    ];
}
