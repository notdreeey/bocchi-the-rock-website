import { useMemo, useState } from "react";
import { Link, useNavigate, useParams } from "react-router-dom";

export default function CharacterFormPage({ characters, onSave }) {
  const { id } = useParams();
  const navigate = useNavigate();
  const editing = Boolean(id);
  const existing = useMemo(() => characters.find((item) => item.id === id), [characters, id]);

  const [name, setName] = useState(existing?.name ?? "");
  const [role, setRole] = useState(existing?.role ?? "");
  const [info, setInfo] = useState(existing?.info ?? "");
  const [imagePath, setImagePath] = useState(existing?.image_path ?? "bocchiart2.jpg");

  const submit = (e) => {
    e.preventDefault();
    if (!name.trim() || !role.trim() || !info.trim()) {
      window.alert("Please complete name, role, and info.");
      return;
    }

    onSave({
      id: existing?.id,
      name: name.trim(),
      role: role.trim(),
      info: info.trim(),
      image_path: imagePath.trim() || "bocchiart2.jpg",
    });
    navigate("/characters");
  };

  if (editing && !existing) {
    return <div>Character not found.</div>;
  }

  return (
    <section id="add_form" className={editing ? "edit" : "add"}>
      <div className={editing ? "edit_char" : "add_char"}>
        <form onSubmit={submit}>
          <h1>{editing ? "Edit Character" : "Add Character Details"}</h1>
          <label htmlFor="name">Name:</label>
          <input id="name" type="text" value={name} onChange={(e) => setName(e.target.value)} required />

          <label htmlFor="role">Role:</label>
          <input id="role" type="text" value={role} onChange={(e) => setRole(e.target.value)} required />

          <label htmlFor="info">Info:</label>
          <textarea id="info" value={info} onChange={(e) => setInfo(e.target.value)} required />

          <label htmlFor="imagePath">Image filename (inside /images):</label>
          <input
            id="imagePath"
            type="text"
            value={imagePath}
            onChange={(e) => setImagePath(e.target.value)}
            placeholder="kitaofficial1.jpg"
          />

          <div className="image-preview-container">
            <img
              className="image-preview"
              style={{ display: "block" }}
              src={`/images/${imagePath || "bocchiart2.jpg"}`}
              alt="Image Preview"
            />
          </div>

          <input type="submit" value={editing ? "Update Character" : "Save Character"} />
          <div className="cancel-reset-container">
            <Link to="/characters">Cancel</Link>
          </div>
        </form>
      </div>
    </section>
  );
}
