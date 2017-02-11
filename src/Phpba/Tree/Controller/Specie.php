
namespace Phpba\Tree\Controller;

use ControllerBase;

use Phpba\Tree\Model\Specie;

class Specie extends ControllerBase {

    public function list() {
        $result = Specie::find('all');
        return json_encode($result);
    }
    
    public function create() {
        $result = Specie::create([
            'name' => $this->request->getAttribute('name'),
            'name_popular' => $this->request->getAttribute('name_popular')
        ]);
        
        if(! $result) {
            //TODO: report error message flash
        }
        
        return json_encode($result);
    }
    
    public function update() {
        $result = Specie::find($this->request->getAttribute('id'))

        $result->name = $this->request->getAttribute('name');
        $result->name_popular = $this->request->getAttribute('name_popular');

        if( ! $result->save()) {
            //TODO: report error message flash
        }
        return json_encode($result);
    }
    
    public function delete() {
        $result = Specie::find($this->request->getAttribute('id'))
        if( ! $result->delete()) {
            //TODO: report error message flash
        }
        return json_encode($result);
    }

}

