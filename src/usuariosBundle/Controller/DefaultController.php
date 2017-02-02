<?php



namespace usuariosBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use usuariosBundle\Entity\User;

use usuariosBundle\Form\UserType;

use usuariosBundle\Entity\Conf;

use usuariosBundle\Form\ConfType;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;



class DefaultController extends Controller
{

   /**
    * @Route("/", name="usuarios")
    */
   public function usuariosAction()
   {
       return $this->render('gestorBundle:Default:index.html.twig');
   }

    /**

     * @Route("/login", name="login")

     */

    public function loginAction(Request $request)
    {
      $authenticationUtils = $this->get('security.authentication_utils');

      // get the login error if there is one
      $error = $authenticationUtils->getLastAuthenticationError();

      // last username entered by the user
      $lastUsername = $authenticationUtils->getLastUsername();

      return $this->render('usuariosBundle:Default:login.html.twig', array(
        'last_username' => $lastUsername,
        'error'         => $error,
      ));

    }

    /**

    * @Route("/admin", name="admin")
    * @Security("has_role('ROLE_ADMIN')")

    */
    public function adminAction()
    {
       return $this->render('usuariosBundle:Default:admin.html.twig');
    }

    /**

     * @Route("/register", name="user_registration")

     */
    public function registerAction(Request $request)

    {

        // 1) build the form

        $user = new User();

        $form = $this->createForm(UserType::class, $user);



        // 2) handle the submit (will only happen on POST)

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {



            // 3) Encode the password (you could also do this via Doctrine listener)

            $password = $this->get('security.password_encoder')

                ->encodePassword($user, $user->getPlainPassword());

            $user->setPassword($password);

            $roles=["ROLE_USER"];
            $user->setRoles($roles);



            // 4) save the User!

            $em = $this->getDoctrine()->getManager();

            $em->persist($user);

            $em->flush();



            // ... do any other work - like sending them an email, etc

            // maybe set a "flash" success message for the user



            return $this->redirectToRoute('usuarios');

        }



        return $this->render(

            'usuariosBundle:Default:register.html.twig',

            array('form' => $form->createView())

        );

    }

    /**
     * @Route("/conf", name="conf")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
     public function confAction()
     {
         $repository = $this->getDoctrine()->getRepository('usuariosBundle:Conf');
         $conf = $repository->findAll();
         return $this->render('usuariosBundle:Default:conf.html.twig',array('Conf' => $conf));
     }


     /**

      * @Route("/newconf", name="newconf")
      * @Security("has_role('ROLE_SUPER_ADMIN')")

      */
      public function newconfAction(Request $request)
      {
          $conf = new Conf();
          $form = $this->createForm(ConfType::class,$conf);
          $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid()) {

         // $form->getData() holds the submitted values

         // but, the original `$task` variable has also been updated

         $empresa = $form->getData();



         // ... perform some action, such as saving the task to the database

         // for example, if Task is a Doctrine entity, save it!

         $em = $this->getDoctrine()->getManager();

         $em->persist($conf);

         $em->flush();



         return $this->redirectToRoute('conf', array('status'=>'OK'));

         }

          return $this->render('usuariosBundle:Default:newConf.html.twig',array('form' => $form->createView()));
      }





}
