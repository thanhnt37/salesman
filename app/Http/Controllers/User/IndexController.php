<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseRequest;
use App\Models\Contact;
use App\Repositories\ContactRepositoryInterface;

class IndexController extends Controller
{
    /** @var \App\Repositories\ContactRepositoryInterface */
    protected $contactRepository;

    public function __construct(
        ContactRepositoryInterface  $contactRepository
    )
    {
        $this->contactRepository    = $contactRepository;
    }

    public function index()
    {
        return view(
            'pages.user.index',
            [
            ]
        );
    }

    public function postContact( BaseRequest $request )
    {
        $input = $request->only(
            [
                'name',
                'email',
                'messages',
            ]
        );
        $input['domain'] = url('/');

        $contact = Contact::create( $input );

        if( empty( $contact ) ) {
            return redirect()
                ->back()
                ->withErrors( trans( 'admin.errors.general.save_failed' ) )
                ->with(
                    'message-failed',
                    trans( 'user.pages.contacts.messages.save_failed' )
                );
        }

        return redirect()
            ->action( 'User\IndexController@index' )
            ->with(
                'message-success',
                trans( 'user.pages.contacts.messages.save_success' )
            );
    }
}
