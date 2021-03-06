<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ClassroomController extends AbstractController
{
    public $names = [
        [
            'name' => 'Elsa',
            'description' => 'Nunc fringilla fermentum odio, sed lobortis risus malesuada ac. Donec fermentum, urna id suscipit eleifend, tellus dolor congue tortor, ac sollicitudin tellus nisi vitae dolor. Suspendisse imperdiet ante et tempor bibendum. Vestibulum eu faucibus nibh, vel elementum purus. Cras et aliquet dui. Mauris imperdiet, arcu non porta hendrerit, odio urna.',
        ],
        [
            'name' => 'Simon',
            'description' => 'Nunc fringilla fermentum odio, sed lobortis risus malesuada ac. Donec fermentum, urna id suscipit eleifend, tellus dolor congue tortor, ac sollicitudin tellus nisi vitae dolor. Suspendisse imperdiet ante et tempor bibendum. Vestibulum eu faucibus nibh, vel elementum purus. Cras et aliquet dui. Mauris imperdiet, arcu non porta hendrerit, odio urna.',
        ],
        [
            'name' => 'Guillaume',
            'description' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In hac habitasse platea dictumst. Praesent eu nisi erat. Nulla facilisi. Suspendisse ut libero nec nisi luctus tincidunt. Donec placerat vulputate leo et tempor. Proin euismod auctor porttitor. Nunc sed volutpat dolor. Mauris fermentum pretium arcu quis.',
        ],
        [
            'name' => 'Julien',
            'description' => 'Suspendisse potenti. Donec quis consectetur odio. Donec quis lacus at justo volutpat luctus eu non tortor. Curabitur sit amet sem nec enim ornare volutpat vitae eget enim. In hac habitasse platea dictumst. Nullam eros lectus, eleifend ut diam in, scelerisque blandit nulla. In hac habitasse platea dictumst. Sed ut blandit.',
        ],
        [
            'name' => 'Charles',
            'description' => 'Nunc fringilla fermentum odio, sed lobortis risus malesuada ac. Donec fermentum, urna id suscipit eleifend, tellus dolor congue tortor, ac sollicitudin tellus nisi vitae dolor. Suspendisse imperdiet ante et tempor bibendum. Vestibulum eu faucibus nibh, vel elementum purus. Cras et aliquet dui. Mauris imperdiet, arcu non porta hendrerit, odio urna.',
        ],
        [
            'name' => 'Romain',
            'description' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In hac habitasse platea dictumst. Praesent eu nisi erat. Nulla facilisi. Suspendisse ut libero nec nisi luctus tincidunt. Donec placerat vulputate leo et tempor. Proin euismod auctor porttitor. Nunc sed volutpat dolor. Mauris fermentum pretium arcu quis.',
        ],
        [
            'name' => 'Fabien',
            'description' => 'Suspendisse potenti. Donec quis consectetur odio. Donec quis lacus at justo volutpat luctus eu non tortor. Curabitur sit amet sem nec enim ornare volutpat vitae eget enim. In hac habitasse platea dictumst. Nullam eros lectus, eleifend ut diam in, scelerisque blandit nulla. In hac habitasse platea dictumst. Sed ut blandit.',
        ],
        [
            'name' => 'Christophe',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        ],
    ];

    public function showStudents(SessionInterface $session)
    {
        // on stocke en session Christophe à la clé lastStudent
        $session->set('lastStudent', 'Christophe');

        return $this->render('classroom/students.html.twig', [
            'students' => $this->names,
            'lastStudent' => $session->get('lastStudent')
        ]);
    }

    public function showStudentInfo($id)
    {
        $studentNumber = count($this->names);

        if ($id >=0 && $id <= $studentNumber) {
            return $this->render('classroom/student-info.html.twig', [
                'student' => $this->names[$id]
            ]);
        } else return $this->render('error/404.html.twig');


    }
}
