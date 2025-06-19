<?php

return [
    'success' => [
        'updated' => 'تم التعديل بنجاح .',
        'added' => 'تم الإضافة بنجاح .',
        'deleted' => 'تم الحذف بمجاح .',
        'logout' => 'تم تسجيل الخروج بنجاح .',

        'orders' => [
            'accepted' => 'تم قبول الطلب بنجاح',
            'cancelled' => 'تم إلغاء الطلب بنجاح',
        ],

        'cart' => [
            'added_successfully' => 'تمت الإضافة إلى السلة بنجاح',
        ],

        'contact' => [
            'message_sent_successfully' => 'تم إرسال رسالتك بنجاح , ستتواصل معك الإدارة قريباً',
        ],

        'checkout' => [
            'order_placed' => 'تمت إضافة الطلب بنجاح ',
        ],

    ],

    'error' => [
        'super_admin' => [
            'only_one_delete' => 'لا يمكن الحذف !! هناك إداري أعلى واحد في النظام .',
            'only_one_edit' => 'لا يمكن التعديل من إداري أعلى إلى إداري عادي , لا يوجد غير إداري أعلى واحد في النظام.',
        ],

        'admins' => [
        ],

        'sections' => [
        ],

        'products' => [
            'repositories' => [
                'quantity_can_not_be_negative' => 'لا يمكن إتمام العملية , هناك (:quantity) فقط من المنتج حالياً في المستودع',
                'quantity_can_not_be_negative-2' => 'لا يمكن إتمام العملية فذلك سيجعل الكمية الكلية بالمستودع قيمة سالبة',
                'quantity_can_not_be_negative-3' => ' هناك (:quantity) فقط من المنتج (:product) حالياً في المستودع',
            ],
        ],

        'users' => [
            'cannot_delete_orders' => 'لا يمكن الحذف !! هناك طلبات مرتبطة بهذ المستخدم .',
        ],

        'settings' => [
            'unknown_mainKey' => 'العملية غير معروفة , حاول مجدداً',
        ],

        'cart' => [
            'already_exists' => 'هذا العنصر موجود بالفعل في السلة',
        ],

        'contact' => [
            'something_went_error' => 'حدث خطأ ما , الرجاء المحاولة في وقت لاحق',
        ],

        'coupons' => [
            'wrong' => 'القسيمة المدخلة غير موجودة',
            'exceeded' => 'هذه القسيمة تجاوزت الحد المسموح لها في الاستخدام وهو :number',
            'expired' => 'هذه القسيمة منتهية الصلاحية بتاريخ :date',
            'related_order' => 'لا يمكنك الحذف, هناك طلبات مرتبطة بهذه القسيمة',
        ],

    ],

    'info' => [
        'super_admin' => [
            'no_need_permissions' => 'ليس هناك داعي لإضافة أدوار للإداري الأعلى .',
        ],

        'checkout' => [
            'you_must_log_in' => 'يجب عليك تسجيل الدخول لمتابعة عملية الطلب .',
            'no_items_in_cart_to_checkout' => 'ليس هناك عناصر في السلة !',
        ],

    ],

    'warning' => [
    ],

    'tooltips' => [
        'leave_it_empty_if_you_wont_update' => 'اترك الحقل فارغاً إذا كنت لا تريد تعديله.',
        'leave_it_empty_if_you_want_it_unlimited' => 'اترك الحقل فارغاً إذا كنت تريد القيمة غير محدودة',

    ],

    'notifications' => [

    ],

];
