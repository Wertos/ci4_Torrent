<?php
declare(strict_types=1);

namespace App\Controllers;

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\Message;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\I18n\Time;
use App\Models\CommentModel;

class CommentController extends BaseController
{
      public $CommentModel;
      public $postData;

      function __construct()
      {
            $this->CommentModel = model(CommentModel::class);
      }

      public function CommentAddAction(int $tId = null)
      {
            $this->postData = $this->request->getPost();

            if (!$this->userData->can_comment) {
                  return redirect()
                        ->back()
                        ->withInput()
                        ->with("error", lang("Comment.addforbidden"));
            }

            if ($tId != $this->postData["tid"]) {
                  return redirect()
                        ->back()
                        ->withInput()
                        ->with("error", lang("Comment.unknownerror"));
            }

            $validation = service("validation");

            $rules = $this->CommentModel->validationRules;

            if (!$this->postData["text"]) {
                  return redirect()
                        ->back()
                        ->withInput()
                        ->with("error", lang("Comment.notext"));
            }

            if (!$this->validateData($this->postData, $rules)) {
                  return redirect()
                        ->back()
                        ->withInput()
                        ->with("errors", $this->validator->getErrors());
            }

			$location = $this->postData["location"];

            $data = [
                  "text" => $this->postData["text"],
                  "created_at" => Time::now(
                        setting("App.appTimezone"),
                  )->toDateTimeString(),
                  "updated_at" => null,
                  "user_id" => (int) $this->userData->id,
                  "tid" => (int) $this->postData["tid"],
                  "location" => $location,
                  "category" => (int) $this->postData["category"],
            ];
            //      var_dump($data); die();
            $this->CommentModel->insert($data);
            return redirect()
                  ->to($location."/" . $tId)
                  ->with("message", lang("Comment.addsuccess"));
      }
}
