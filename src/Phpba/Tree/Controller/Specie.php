
namespace Phpba\Tree\Controller;

use Phpba\Tree\Model\Specie;

class Specie {

    public function list() {
        $result = Specie::find('all');
        return json_encode($result);
    }
    
    public function create() {
        $result = Specie::create([
            'name' => $name
        ]);
        
        if(! $result) {
            //TODO: report error message flash
        }
        
        return json_encode($result);
    }
    
    public function update() {
        $result = Specie::find($this->request->getAttribute('id'))
        $result->name = $this->request->getAttribute('name');
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

