<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ContactRepositoryInterface;
use App\Http\Requests\Admin\ContactRequest;
use App\Http\Requests\PaginationRequest;

class ContactController extends Controller
{

    /** @var \App\Repositories\ContactRepositoryInterface */
    protected $contactRepository;


    public function __construct(
        ContactRepositoryInterface $contactRepository
    )
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\PaginationRequest $request
     *
     * @return \Response
     */
    public function index( PaginationRequest $request )
    {
        $paginate[ 'offset' ]       = $request->offset();
        $paginate[ 'limit' ]        = $request->limit();
        $paginate[ 'order' ]        = $request->order();
        $paginate[ 'direction' ]    = $request->direction();
        $paginate[ 'baseUrl' ]      = action( 'Admin\ContactController@index' );

        $count = $this->contactRepository->count();
        $contacts = $this->contactRepository->get(
            $paginate[ 'order' ],
            $paginate[ 'direction' ],
            $paginate[ 'offset' ],
            $paginate[ 'limit' ]
        );

        return view(
            'pages.admin.contacts.index',
            [
                'contacts' => $contacts,
                'count'    => $count,
                'paginate' => $paginate,
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Response
     */
    public function show( $id )
    {
        $contact = $this->contactRepository->find( $id );
        if( empty( $contact ) ) {
            abort( 404 );
        }

        return view(
            'pages.admin.contacts.edit',
            [
                'isNew'   => false,
                'contact' => $contact,
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Response
     */
    public function destroy( $id )
    {
        /** @var \App\Models\Contact $contact */
        $contact = $this->contactRepository->find( $id );
        if( empty( $contact ) ) {
            abort( 404 );
        }
        $this->contactRepository->delete( $contact );

        return redirect()
            ->action( 'Admin\ContactController@index' )
            ->with( 'message-success', trans( 'admin.messages.general.delete_success' ) );
    }

}
