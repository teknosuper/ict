<?php 

switch ($_SERVER['SERVER_NAME']) {
    //stackexchange site
    case 'ict.project':
            $urlRules  = [
                '<url:.+/>' => 'site/redirect',
                'sitemap.xml' => 'site/sitemap',
                'adminmanage'=>'adminmanage',
                'p/<page_id:>/<page_title:>'=>'classified/default/pagedetail',
                'product/detail/<product_id:>/<product_title:>'=>'classified/default/detail',
                'product/detail/<product_id:>'=>'classified/default/detail',
                'product'=>'classified/default/product',
                '/'=>'classified',

            ];
        # code...
        break;
	default:
            $urlRules  = [
                '<url:.+/>' => 'site/redirect',
                'student/quiz/preview/<quiz_id:>'=>'student/quiz/preview',                
                'student/quiz/result/<quiz_id:>'=>'student/quiz/result',                
                'student/quiz/take/<quiz_id:>'=>'student/quiz/take',                
                'student/quiz/end/<quiz_id:>'=>'student/quiz/end',                
                'profile/password'=>'student/default/password',
                'profile'=>'student/default/profile',
                'dashboard/banksoalpublish'=>'dashboard/quiz/publish',
                'dashboard/banksoalview'=>'dashboard/quiz/view',
                'dashboard/banksoal'=>'dashboard/quiz',
                '/'=>'dashboard',
            ];
		# code...
		break;
}

return $urlRules;
