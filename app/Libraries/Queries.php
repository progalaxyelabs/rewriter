<?php

namespace App\Libraries;

class Queries
{
    const GetAllGenericTemplates = "
        select
            generic_template_id,
            generic_template_name,
            created_at,
            last_updated_at
        from generic_templates; 
    ";

    const InsertGenericTemplate = "
        insert into generic_templates
        (generic_template_name)
        values
        (?);
    ";

    const UpdateGenericTemplate = "
        update generic_templates
        set generic_template_name = ?
        where generic_template_id = ?;
    ";

    const GetGenericScreensByTemplateId = "
        select
            gt.generic_template_id,
            gt.generic_template_name,
            gs.generic_screen_id,
            gs.generic_screen_name
        from generic_templates gt
        left join generic_screens gs on gs.generic_template_id = gt.generic_template_id
        where gt.generic_template_id = ?;
    ";

    const GetGenericScreenByTemplateId = "
        select
            gs.generic_screen_name,
            gt.generic_template_name,
            gt.generic_template_id,
            gs.generic_screen_id
        from generic_screens gs
        join generic_templates gt on gt.generic_template_id = gs.generic_template_id
        where gs.generic_screen_id = ?";

    const InsertGenericScreen = "
        insert into generic_screens
        (generic_template_id, generic_screen_name)
        values
        (?, ?);
    ";

    const UpdateGenericScreen = "
        update generic_screens
        set generic_screen_name = ?
        where generic_screen_id = ?;
    ";

    const GetGenericFormByScreenId = "
        select
            gs.generic_screen_id,
            gs.generic_screen_name,
            gf.generic_form_id,
            gf.generic_form_name,
            gf.config
        from generic_screens gs
        left join generic_forms gf on gf.generic_screen_id = gs.generic_screen_id
        where gs.generic_screen_id = ?;
    ";

    const GetGenericFormsByScreenId = "
        select 
            generic_form_id,
            generic_form_name,
            generic_screen_id
        from generic_forms
        where generic_screen_id = ?;    
    ";

    const GetGenericFormByFormId ="
        select 
            gf.generic_form_id,
            gf.generic_form_name,
            gs.generic_screen_id,
            gs.generic_screen_name,
            gt.generic_template_id,
            gt.generic_template_name
		from generic_forms gf
		join generic_screens gs on gs.generic_screen_id = gf.generic_screen_id
		join generic_templates gt on gt.generic_template_id = gs.generic_template_id
		where gf.generic_form_id = ?;
		";

    const InsertGenericForm = "
        insert into generic_forms
        (generic_screen_id, generic_form_name, config)
        values
        (?, ?, ?);
    ";

    const UpdateGenericFormConfig = "
        update generic_forms
        set config = ?
        where generic_form_id = ?;
    ";

    const GetGenericFormConfigById = "
        select config
        from generic_forms
        where generic_form_id = ?;
    ";

    const GetCustomerById = "
        select 
            customer_id, 
            customer_full_name,
            customer_signin_name
        from customers
        where customer_id = ?;    
    ";

    const GetCustomerBySigninName = "
        select
            customer_id, 
            customer_full_name,
            customer_signin_name,
            customer_password
        from customers 
        where customer_signin_name = ?;
    ";

    const GetCustomerBizById = "
        select 
            customer_biz_id,
            customer_id,
            customer_biz_name,
            created_at,
            last_updated_at
        from customer_biz
        where customer_id = ?;
    ";

    const GetBizScreens = "
        select
            biz_screen_id,
            biz_screen_name,
            customer_biz_id,
            created_at,
            last_updated_at
        from biz_screens
        where customer_biz_id = ?;
    ";

    const GetBizForms = "
        select
            biz_form_id,
            biz_form_name,
            biz_screen_id,
            config,
            created_at,
            last_updated_at
        from biz_forms
        where biz_screen_id = ?;
    ";

    const GetBizScreenAndFormNames = "
    select
        bf.biz_form_id,
        bf.biz_form_name,
        bs.biz_screen_id,
        bs.biz_screen_name
        from biz_forms bf
        join biz_screens bs on bs.biz_screen_id = bf.biz_screen_id
        where bf.biz_form_id;
    ";
    
    const GetCustomerBizNameByCustomerId = "
    select
        c.customer_id,
        c.customer_full_name,
        cb.customer_biz_id,
        cb.customer_biz_name
        from customers c
        left join customer_biz cb on cb.customer_id = c.customer_id
        where c.customer_id = ?;
    ";

    const GetCustomerBizNameByCustomerBizId = "
    select
        c.customer_id,
        cb.customer_biz_id,
        cb.customer_biz_name
        from customers c
        join customer_biz cb on cb.customer_id = c.customer_id
        where cb.customer_biz_id = ?;
    ";

    const GetBizScreenNameByBizScreenId ="
    select
        cb.customer_biz_id,
        bs.biz_screen_name,
        bs.biz_screen_id
        from biz_screens bs
        join customer_biz cb on cb.customer_biz_id = bs.customer_biz_id
        where bs.biz_screen_id = ?;
    ";

    const GetBizScreenNameByCustomerBizId = "
    select
        c.customer_id,
        c.customer_full_name,
        cb.customer_biz_id,
        cb.customer_biz_name,
        bs.biz_screen_name
        from biz_screens bs
        join customer_biz cb on cb.customer_biz_id = bs.customer_biz_id
        join customers c on c.customer_id = cb.customer_id
        where cb.customer_biz_id = ?;
    ";
}
