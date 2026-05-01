<?php
class Model
{
    public $db = null;

    // MODIFIED: Removed database connection so it doesn't crash on Vercel
    function __construct()
    {
        // No DB connection needed for frontend showcase
    }

    // MODIFIED: Returns fake data instead of querying database
    public function getCharacterList()
    {
        return [
            (object) ['id' => 1, 'name' => 'Hitori Gotoh', 'role' => 'Lead Guitar', 'info' => 'Extremely anxious and socially awkward.', 'image_path' => 'bocchiart2.jpg'],
            (object) ['id' => 2, 'name' => 'Nijika Ijichi', 'role' => 'Drums', 'info' => 'The energetic leader of Kessoku Band.', 'image_path' => 'nijikaofficial1.jpg'],
            (object) ['id' => 3, 'name' => 'Ryo Yamada', 'role' => 'Bass', 'info' => 'Cool and aloof, but always broke.', 'image_path' => 'ryoofficial1.jpg'],
            (object) ['id' => 4, 'name' => 'Ikuyo Kita', 'role' => 'Vocals/Guitar', 'info' => 'Cheerful and outgoing, the opposite of Bocchi.', 'image_path' => 'kitaofficial1.jpg']
        ];
    }

    // MODIFIED: Returns a fake specific character
    public function getCharacterById($id)
    {
        // Returns an array because your view expects an array for details
        return [
            'id' => $id,
            'name' => 'Frontend Showcase Character',
            'role' => 'Mock Role',
            'info' => 'This is mock data. Database is disabled for Vercel deployment.',
            'image_path' => 'bocchiart2.jpg'
        ];
    }

    // MODIFIED: Fake successful operations
    public function deleteCharacter($id)
    {
        return "Character deleted successfully (Showcase Mode).";
    }

    public function updateCharacter($id, $image_path, $name, $role, $info)
    {
        return "Character updated successfully (Showcase Mode).";
    }

    public function addCharacter($image_path, $name, $role, $info)
    {
        return "Character added successfully (Showcase Mode).";
    }

    // MODIFIED: Fake search results
    public function searchCharacter($name)
    {
        return [
            (object) ['id' => 1, 'name' => 'Search Result for: ' . $name, 'role' => 'Mock Data', 'info' => 'Search logic mocked.', 'image_path' => 'bocchiart2.jpg']
        ];
    }
}
?>