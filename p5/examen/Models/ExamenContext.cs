using System;
using System.Collections.Generic;
using Microsoft.EntityFrameworkCore;

namespace examen.Models;

public partial class ExamenContext : DbContext
{
    public ExamenContext()
    {
    }

    public ExamenContext(DbContextOptions<ExamenContext> options)
        : base(options)
    {
    }

    public virtual DbSet<Distrito> Distritos { get; set; }

    public virtual DbSet<Impuesto> Impuestos { get; set; }

    public virtual DbSet<Persona> Personas { get; set; }

    public virtual DbSet<Propiedad> Propiedads { get; set; }

    public virtual DbSet<Usuario> Usuarios { get; set; }

    public virtual DbSet<Zona> Zonas { get; set; }

    protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
#warning To protect potentially sensitive information in your connection string, you should move it out of source code. You can avoid scaffolding the connection string by using the Name= syntax to read it from configuration - see https://go.microsoft.com/fwlink/?linkid=2131148. For more guidance on storing connection strings, see https://go.microsoft.com/fwlink/?LinkId=723263.
        => optionsBuilder.UseSqlServer("Server=DESKTOP-8J8GP82\\SQLEXPRESS;Database=examen;Trusted_Connection=True;TrustServerCertificate=True;");

    protected override void OnModelCreating(ModelBuilder modelBuilder)
    {
        modelBuilder.Entity<Distrito>(entity =>
        {
            entity.HasKey(e => e.IdDistrito).HasName("PK__distrito__494092A841B4E25B");

            entity.ToTable("distrito");

            entity.Property(e => e.IdDistrito).HasColumnName("idDistrito");
            entity.Property(e => e.Nombre)
                .HasMaxLength(100)
                .HasColumnName("nombre");
        });

        modelBuilder.Entity<Impuesto>(entity =>
        {
            entity.HasKey(e => e.IdImpuesto).HasName("PK__impuesto__D2C601584E09773C");

            entity.ToTable("impuesto");

            entity.Property(e => e.IdImpuesto).HasColumnName("idImpuesto");
            entity.Property(e => e.TipoImpuesto)
                .HasMaxLength(50)
                .HasColumnName("tipoImpuesto");
        });

        modelBuilder.Entity<Persona>(entity =>
        {
            entity.HasKey(e => e.IdPersona).HasName("PK__persona__A4788141AD3CB7A5");

            entity.ToTable("persona");

            entity.Property(e => e.IdPersona).HasColumnName("idPersona");
            entity.Property(e => e.ApellidoMaterno)
                .HasMaxLength(100)
                .HasColumnName("apellido_materno");
            entity.Property(e => e.ApellidoPaterno)
                .HasMaxLength(100)
                .HasColumnName("apellido_paterno");
            entity.Property(e => e.Ci).HasColumnName("ci");
            entity.Property(e => e.Direccion)
                .HasMaxLength(255)
                .HasColumnName("direccion");
            entity.Property(e => e.IdDistrito).HasColumnName("idDistrito");
            entity.Property(e => e.IdPropiedad).HasColumnName("idPropiedad");
            entity.Property(e => e.IdZona).HasColumnName("idZona");
            entity.Property(e => e.Nombre)
                .HasMaxLength(100)
                .HasColumnName("nombre");

            entity.HasOne(d => d.IdPropiedadNavigation).WithMany(p => p.Personas)
                .HasForeignKey(d => d.IdPropiedad)
                .OnDelete(DeleteBehavior.Cascade)
                .HasConstraintName("persona_ibfk_1");
        });

        modelBuilder.Entity<Propiedad>(entity =>
        {
            entity.HasKey(e => e.IdPropiedad).HasName("PK__propieda__C77DC045BDD3D8A4");

            entity.ToTable("propiedad");

            entity.Property(e => e.IdPropiedad).HasColumnName("idPropiedad");
            entity.Property(e => e.CodigoCatastral)
                .HasMaxLength(50)
                .HasColumnName("codigoCatastral");
            entity.Property(e => e.Direccion)
                .HasMaxLength(255)
                .HasColumnName("direccion");
            entity.Property(e => e.IdImpuesto).HasColumnName("idImpuesto");

            entity.HasOne(d => d.IdImpuestoNavigation).WithMany(p => p.Propiedads)
                .HasForeignKey(d => d.IdImpuesto)
                .HasConstraintName("propiedad_impuesto_fk");
        });

        modelBuilder.Entity<Usuario>(entity =>
        {
            entity.HasKey(e => e.Id).HasName("PK__usuarios__3213E83FFA401293");

            entity.ToTable("usuarios");

            entity.Property(e => e.Id).HasColumnName("id");
            entity.Property(e => e.Password)
                .HasMaxLength(255)
                .HasColumnName("password");
            entity.Property(e => e.PersonaId).HasColumnName("persona_id");
            entity.Property(e => e.Usuario1)
                .HasMaxLength(20)
                .HasColumnName("usuario");

            entity.HasOne(d => d.Persona).WithMany(p => p.Usuarios)
                .HasForeignKey(d => d.PersonaId)
                .OnDelete(DeleteBehavior.Cascade)
                .HasConstraintName("usuarios_persona_idPersona_fk");
        });

        modelBuilder.Entity<Zona>(entity =>
        {
            entity.HasKey(e => e.IdZona).HasName("PK__zona__1EE4D75C337C5EB6");

            entity.ToTable("zona");

            entity.HasIndex(e => e.IdDistrito, "idx_idDistrito");

            entity.Property(e => e.IdZona).HasColumnName("idZona");
            entity.Property(e => e.IdDistrito).HasColumnName("idDistrito");
            entity.Property(e => e.Nombre)
                .HasMaxLength(100)
                .HasColumnName("nombre");

            entity.HasOne(d => d.IdDistritoNavigation).WithMany(p => p.Zonas)
                .HasForeignKey(d => d.IdDistrito)
                .HasConstraintName("zona_ibfk_1");
        });

        OnModelCreatingPartial(modelBuilder);
    }

    partial void OnModelCreatingPartial(ModelBuilder modelBuilder);
}
